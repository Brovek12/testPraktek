@extends('layouts.app')
@section('title', 'Pengguna Aplikasi')
@section('style')

@endsection

@section('pageTitle', 'Pengguna')
@section('mainSection', 'Konfigurasi')
@section('currentSection', 'Pengguna')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div class="mb-5 card mb-xl-8">
                    <!--begin::Header-->
                    <div class="p-0 pt-5 border-0 card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="mb-1 card-label fw-bold fs-3 ps-6">List Pengguna</span>
                        </h3>
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <div class="my-1 d-flex align-items-center position-relative me-5 rounded-3">
                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-6"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <input type="text" data-kt-docs-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-15"
                                    placeholder="Cari Nama, Email, No HP, Hak Akses"
                                    style="height: calc(1.5em + 0.75rem + 2px);" />
                            </div>

                            <div class="col">
                                <a href="#" class="py-1 btn btn-light rounded-3 btn-sm me-6" style="height: 60%;"
                                    data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-start">
                                    <i class="mb-1 ki-outline ki-filter me-1" style="color: #333333"></i>
                                    <span class="text-dark-600 fw-semibold">Filter</span>
                                </a>

                                <!--begin::Menu-->
                                <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-active-bg menu-state-color fw-semibold fs-base w-175px"
                                    data-kt-menu="true" style="position: absolute; z-index: 1000;">
                                    <!--begin::Menu item-->
                                    <div class="px-3 my-0 menu-item menu-status">
                                        <a href="#" class="px-3 py-2 menu-link status-item" data-status="">
                                            <span class="menu-title">Semua Jabatan</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    @foreach ($role as $item)
                                        <!--begin::Menu item-->
                                        <div class="px-3 my-0 menu-item menu-status">
                                            <a href="#" class="px-3 py-2 menu-link status-item"
                                                data-status="{{ $item->id }}">
                                                <span class="menu-title">{{ $item->name }}</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    @endforeach
                                </div>
                                <!--end::Menu-->
                            </div>

                            @can('create-users')
                                <button type="button" class="btn btn-sm btn-primary btn-active-light-primary me-6"
                                    data-bs-toggle="modal" data-bs-target="#kt_modal_add">
                                    <i class="ki-duotone ki-plus fs-3"></i>
                                    Tambah
                                </button>
                            @endcan

                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="p-0 card-body">
                        <!--begin::Table container-->
                        <div class="table-responsive table-bordered">
                            <!--begin::Wrapper-->


                            <!--end::Wrapper-->
                            <!--begin::Table-->
                            <table class="table text-center align-middle gs-0 gy-4" id="userTable">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="p-0 fw-bold text-muted">
                                        <th class="text-center bg-light">No</th>
                                        <th class="text-center bg-light">Foto</th>
                                        <th class="text-center bg-light">Nama</th>
                                        <th class="text-center bg-light">Email</th>
                                        <th class="text-center bg-light">Username</th>
                                        <th class="text-center bg-light">Nomor HP</th>
                                        <th class="text-center bg-light">Hak Akses</th>
                                        {{-- <th class="text-center bg-light">Gudang</th> --}}
                                        {{-- <th class="text-center bg-light">Status</th> --}}
                                        <th class="text-center bg-light">Aksi</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach ($data as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">
                                                @if ($item->foto)
                                                    <img src="{{ asset($item->foto) }}" alt="User Foto"
                                                        class="rounded-circle"
                                                        style="width: 50px; height: 50px; object-fit: cover; border: 2px solid #DBDFE9">
                                                @else
                                                    <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="No Foto"
                                                        class="rounded-circle"
                                                        style="width: 50px; height: 50px; object-fit: cover; border: 2px solid #DBDFE9">
                                                @endif
                                            </td>
                                            <td class="ps-4">
                                                <a href="{{ route('user.show', $item->id) }}"
                                                    class="mb-1 text-gray-900 text-hover-primary">
                                                    {{ $item->name }}
                                                </a>
                                            </td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td class="text-center">{{ $item->phone ?? '-' }}</td>
                                            <td>{{ $item->getRoleNames()->first() ?? 'N/A' }}</td>
                                            {{-- <td>
                                                {{ \App\Models\User::where('warehouse_id', $item->kelurahan_id)->first()->name ?? '-' }}
                                            </td> --}}
                                            {{-- <td class="text-center">
                                                <span
                                                    class="mt-1 fw-semibold d-block fs-7 {{ $item->status == 'active' ? 'text-success' : 'text-danger' }}">
                                                    {{ ucfirst($item->status) }}
                                                </span>
                                            </td> --}}
                                            <td class="text-center">
                                                {{-- <a href="{{ route('user.show', $item->id) }}" class="btn btn-icon btn-sm">
                                                    <i class="text-gray-700 ki-outline ki-gear text-hover-info fs-1"></i>
                                                </a> --}}
                                                @can('edit-users')
                                                    <button type="button" class="btn btn-icon btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_edit{{ $item->id }}">
                                                        <i class="ki-outline ki-pencil text-warning text-hover-info fs-2"></i>
                                                    </button>
                                                @endcan
                                                @can('delete-users')
                                                    <button type="button" class="btn btn-icon btn-sm btn-delete"
                                                        onclick="confirmDelete({{ $item->id }})">
                                                        <i class="ki-outline ki-trash text-danger text-hover-info fs-2"></i>
                                                    </button>
                                                @endcan

                                                <form id="delete-form-{{ $item->id }}"
                                                    action="{{ route('user.destroy', $item->id) }}" method="POST"
                                                    style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @include('admin.users.modal-edit')
                                    @endforeach
                                </tbody>

                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
                <!--end::Tables Widget 12-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    @include('admin.users.modal-add')
    <!--end::Content-->

    {{-- modal import --}}
    {{-- <div class="modal fade" tabindex="-1" id="kt_modal_import">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data Pengguna</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <form id="importForm" action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- File -->
                        <div class="mb-3">
                            <label for="file" class="form-label">
                                Upload File Excel
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" name="file" id="file" class="form-control" required>
                            <div class="mt-1 text-danger d-none" id="fileError"></div>
                        </div>

                        <div class="px-0 modal-footer">
                            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var table = $('#userTable').DataTable({
                "searching": true,
                "ordering": true,
                "paging": true,
                "info": true,
                "search": {
                    "smart": false,
                    "regex": false,
                    "caseInsensitive": true
                }
            });

            $('[data-kt-docs-table-filter="search"]').on('keyup', function() {
                table.search(this.value).draw();
            });
        });

        function confirmDelete(userId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'var(--bs-primary)',
                cancelButtonColor: 'var(--bs-danger)',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + userId).submit();
                }
            });
        }

        document.querySelectorAll('.menu-status .status-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();

                const selectedRole = this.getAttribute('data-status');
                const url = new URL(window.location.href);
                const params = new URLSearchParams(url.search);

                if (selectedRole) {
                    params.set('role', selectedRole);
                } else {
                    params.delete('role');
                }

                window.location.search = params.toString();
            });
        });
    </script>
@endsection
