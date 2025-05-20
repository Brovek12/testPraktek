<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $manajemenUser;

    public function __construct(User $manajemenUser)
    {
        $this->manajemenUser = $manajemenUser;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // if (!$user->hasPermissionTo('read-users')) {
        //     abort(403, 'Unallowed.');
        // }

        $roleId = $request->query('role');

        $usersQuery = User::query();

        if ($roleId) {
            $usersQuery = $usersQuery->whereHas('roles', function ($query) use ($roleId) {
                $query->where('roles.id', $roleId);
            });
        }

        $db = $usersQuery->latest()->get();

        $view = [
            'data' => $db,
            'role' => Role::all(),
        ];

        return view('admin.users.index', $view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // if (!$user->hasPermissionTo('create-users')) {
        //     abort(403, 'Unallowed.');
        // }

        DB::beginTransaction();
        try {
            $request->validate([
                'username' => 'required|string',
                'email' => 'required|string|email',
                'phone' => 'required|string',
                'name' => 'required|string',
                'password' => 'required|string|min:6',
                'role' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
                'warehouse_id' => 'nullable|string',
            ]);

            $usernameTersedia = $this->manajemenUser->where('username', $request->username)->first();
            if ($usernameTersedia !== null) {
                throw new Exception('Username Telah Dipakai!');
            }

            $emailTersedia = $this->manajemenUser->where('email', $request->email)->first();
            if ($emailTersedia !== null) {
                throw new Exception('Email Telah Dipakai!');
            }

            $data = [
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
                'warehouse_id' => $request->warehouse_id,
            ];

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('photos'), $imageName);
                $data['foto'] = 'photos/' . $imageName;
            }

            $user = $this->manajemenUser->create($data);
            $user->syncRoles([$request->role]);

            DB::commit();

            session()->flash('OK', 'Data berhasil ditambahkan!');
            return redirect()->route('user.index');
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('ERR', 'Data gagal ditambahkan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $access = Auth::user();

        // if (!$access->hasPermissionTo('edit-users')) {
        //     abort(403, 'Unallowed.');
        // }

        DB::beginTransaction();
        try {
            $request->validate([
                'username' => 'required|string|unique:users,username,' . $user->id,
                'email' => 'required|string|email|unique:users,email,' . $user->id,
                'phone' => 'required|string',
                'name' => 'required|string',
                'role' => 'required|string',
                'warehouse_id' => 'nullable|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
            ]);

            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->warehouse_id = $request->warehouse_id;
            $user->name = $request->name;

            if ($request->hasFile('foto')) {
                if ($user->foto && file_exists(public_path($user->foto))) {
                    unlink(public_path($user->foto));
                }

                $image = $request->file('foto');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('photos'), $imageName);
                $user->foto = 'photos/' . $imageName;
            }

            $user->syncRoles([$request->role]);

            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();
            DB::commit();

            session()->flash('OK', 'Data berhasil diupdate!');
            return redirect()->route('user.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('ERR', 'Data gagal diupdate: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();

        // if (!$user->hasPermissionTo('delete-users')) {
        //     abort(403, 'Unallowed.');
        // }

        DB::beginTransaction();
        try {
            $manajemenUser = User::findOrFail($id);
            $manajemenUser->delete();

            DB::commit();

            session()->flash('OK', 'Data berhasil dihapus!');
            return redirect()->route('user.index');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            $message = $e->getCode() === "23000" ?
                'User terkait data lain dan tidak bisa dihapus!' :
                'Terjadi kesalahan: ' . $e->getMessage();
            session()->flash('ERR', $message);
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('ERR', 'Data gagal dihapus: ' . $e->getMessage());
        }

        return redirect()->back()->withInput();
    }
}
