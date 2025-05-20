@extends('layouts.app')
@section('title', 'Jabatan dan Hak Akses')
@section('style')
    <style>
        #roleTable {
            border-collapse: collapse;
            width: 100%;
        }


        #roleTable th,
        #roleTable td {
            padding: 8px;
            text-align: center;
            vertical-align: middle;
        }
    </style>
@endsection

@section('pageTitle', 'Jabatan & Hak Akses')
@section('mainSection', 'Konfigurasi')
@section('currentSection', 'Jabatan')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div class="mb-5 card mb-xl-8">
                    <!--begin::Header-->
                    <div class="pt-5 border-0 card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="mb-1 card-label fw-bold fs-3">List Jabatan Dan Hak Akses</span>
                        </h3>
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <div class="my-1 d-flex align-items-center position-relative me-5 rounded-3">
                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-6"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <input type="text" data-kt-docs-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-15"
                                    placeholder="Cari Nama, Hak Akses, Jumlah User"
                                    style="height: calc(1.5em + 0.75rem + 2px);" />
                            </div>

                            {{-- <button type="button" class="btn btn-sm btn-light btn-active- me-6">
                                <i class="ki-outline ki-filter fs-4"></i>
                                Filter
                            </button> --}}

                            {{-- <button type="button" class="btn btn-sm btn-light btn-active- me-3">
                                <i class="ki-outline ki-exit-up fs-4"></i>
                                Export
                            </button>

                            <button type="button" class="btn btn-sm btn-light btn-active- me-3">
                                <i class="ki-outline ki-exit-down fs-4"></i>
                                Import
                            </button> --}}

                            @can('create-roles')
                                <button type="button" class="btn btn-sm btn-primary btn-active-light-primary "
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
                            <table class="table align-middle gs-0 gy-4 " id="roleTable">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="p-0 fw-bold text-muted bg-light">
                                        <th class="text-center">No</th>
                                        <th>Name</th>
                                        <th>Jumlah Hak Akses</th>
                                        <th>Jumlah User</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @foreach ($data as $index => $role)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->permissions_count }} Hak Akses</td>
                                            <td>{{ $role->model_has_role_count }} User</td>
                                            <td class="text-center">
                                                <a href="{{ route('role.show', $role->id) }}" class="btn btn-icon btn-sm">
                                                    <i class="text-gray-700 ki-outline ki-gear text-hover-info fs-1"></i>
                                                </a>

                                                @can('edit-roles')
                                                    <button type="button" class="btn btn-icon btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_edit{{ $role->id }}">
                                                        <i class="ki-outline ki-pencil text-warning text-hover-info fs-2"></i>
                                                    </button>
                                                @endcan

                                                @can('delete-roles')
                                                    <button type="button" class="btn btn-icon btn-sm btn-delete"
                                                        onclick="confirmDelete({{ $role->id }})">
                                                        <i class="ki-outline ki-trash text-danger text-hover-info fs-2"></i>
                                                    </button>
                                                @endcan

                                                <form id="delete-form-{{ $role->id }}"
                                                    action="{{ route('role.destroy', $role->id) }}" method="POST"
                                                    style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @include('admin.roles.modal-edit')
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
    @include('admin.roles.modal-add')
    <!--end::Content-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var table = $('#roleTable').DataTable({
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

        function confirmDelete(roleId) {
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
                    document.getElementById('delete-form-' + roleId).submit();
                }
            });
        }
    </script>
@endsection
