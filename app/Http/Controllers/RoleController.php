<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleController extends Controller
{
    protected $role;
    protected $user;
    public function __construct(Role $role, User $user)
    {
        $this->role = $role;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // if (!$user->hasPermissionTo('read-roles')) {
        //     abort(403, 'Unallowed.');
        // }

        $roles = $this->role
            ->withCount(['permissions', 'users as model_has_role_count'])
            ->latest()
            ->get();

        $view = [
            'data' => $roles,
        ];

        return view('admin.roles.index', $view);
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
    public function store(RoleRequest $request)
    {
        $user = Auth::user();

        // if (!$user->hasPermissionTo('create-roles')) {
        //     abort(403, 'Unallowed.');
        // }

        DB::beginTransaction();
        try {
            $existingRole = $this->role->where('name', $request->name)->first();

            if ($existingRole) {
                throw new Exception('Nama Role Telah Dipakai!');
            }

            $this->role->create([
                'name' => $request->name,
                'guard_name' => 'web',
            ]);

            DB::commit();

            session()->flash('OK', 'Data berhasil ditambahkan!');
            return redirect()->route('role.index');
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('ERR', 'Data gagal ditambahkan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $user = Auth::user();

        // if (!$user->hasPermissionTo('read-roles')) {
        //     abort(403, 'Unallowed.');
        // }

        $db = $this->role
            ->with('permissions')
            ->withCount(['permissions', 'users as model_has_role_count'])
            ->where('id', $role->id)
            ->first();

        $dataPermission = DB::table('permissions')
            ->select('group', DB::raw('GROUP_CONCAT(name) as names'), DB::raw('GROUP_CONCAT(display_name) as displays'), DB::raw('GROUP_CONCAT(id) as id'), DB::raw('COUNT(*) as permission_count'))
            ->groupBy('group')
            ->orderByDesc('permission_count')
            ->get();

        $view = [
            'data' => $db,
            'dataPermission' => $dataPermission,
        ];

        return view('admin.roles.setting', $view);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, $id)
    {
        $user = Auth::user();

        // if (!$user->hasPermissionTo('edit-roles')) {
        //     abort(403, 'Unallowed.');
        // }

        DB::beginTransaction();
        try {
            $role = $this->role->findOrFail($id);

            $existingRole = $this->role
                ->where('name', $request->name)
                ->where('id', '!=', $id)
                ->first();

            if ($existingRole) {
                throw new Exception('Nama Role Telah Dipakai!');
            }

            $role->update([
                'name' => $request->name,
                'guard_name' => 'web',
            ]);

            DB::commit();

            session()->flash('OK', 'Data berhasil diupdate!');
            return redirect()->route('role.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('ERR', 'Data gagal diupdate: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function updatePermissions(Request $request)
    {
        $user = Auth::user();

        // if (!$user->hasPermissionTo('edit-roles')) {
        //     abort(403, 'Unallowed.');
        // }

        if ($request->ajax()) {
            $roleId = $request->input('roleId');
            $selectedPermissions = $request->input('permissions');
            $role = Role::findOrFail($roleId);

            if ($role) {
                $role->permissions()->sync($selectedPermissions);
                app()[PermissionRegistrar::class]->forgetCachedPermissions();
                return response()->json(['message' => 'Hak akses berhasil diperbarui']);
            } else {
                return response()->json(['message' => 'Hak akses gagal diperbarui'], 404);
            }
        } else {
            abort(404);
        }
    }

    public function updateSinglePermissions(Request $request)
    {
        $user = Auth::user();

        // if (!$user->hasPermissionTo('edit-roles')) {
        //     abort(403, 'Unallowed.');
        // }

        if ($request->ajax()) {
            $roleId = $request->input('roleId');
            $selectedPermission = $request->input('permissionId');
            $role = Role::findOrFail($roleId);

            if ($role && !$role->permissions->contains($selectedPermission)) {
                $role->permissions()->attach($selectedPermission);
                app()[PermissionRegistrar::class]->forgetCachedPermissions();
                return response()->json(['message' => 'Hak akses berhasil ditambahkan']);
            } else {
                return response()->json(['message' => 'Hak akses gagal ditambahkan'], 404);
            }
        } else {
            abort(404);
        }
    }

    public function deletePermissions(Request $request)
    {
        $user = Auth::user();

        // if (!$user->hasPermissionTo('delete-roles')) {
        //     abort(403, 'Unallowed.');
        // }

        if ($request->ajax()) {
            $roleId = $request->input('roleId');
            $selectedPermission = $request->input('permissionId');
            $role = Role::findOrFail($roleId);

            if ($role && $role->permissions->contains($selectedPermission)) {
                $role->permissions()->detach($selectedPermission);
                app()[PermissionRegistrar::class]->forgetCachedPermissions();
                return response()->json(['message' => 'Hak akses berhasil dihapus']);
            } else {
                return response()->json(['message' => 'Hak akses gagal dihapus'], 404);
            }
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();

        // if (!$user->hasPermissionTo('delete-roles')) {
        //     abort(403, 'Unallowed.');
        // }

        DB::beginTransaction();
        try {
            $role = $this->role->findOrFail($id);

            if ($role->users()->count() > 0) {
                throw new Exception('Role ini terhubung dengan user dan tidak bisa dihapus!');
            }

            $role->delete();
            DB::commit();

            session()->flash('OK', 'Data berhasil dihapus!');
            return redirect()->route('role.index');
        } catch (Exception $e) {
            DB::rollBack();

            session()->flash('ERR', 'Data gagal dihapus: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
