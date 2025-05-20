@extends('layouts.app')
@section('title', 'Jabatan dan Hak Akses')
@section('style')
@endsection

@section('pageTitle', 'Jabatan & Hak Akses')
@section('mainSection', 'Konfigurasi')
@section('currentSection', 'Setting Jabatan')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div class="mb-4 row g-5 g-xl-8">
                    <div class="col-md-12">
                        <div class="card">
                            <!--begin::Header-->
                            <div class="py-5 border-0 card-header">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="mb-1 card-label fw-bold fs-3">{{ $data?->name }}</span>
                                </h3>
                                <div class="gap-3 card-toolbar">
                                    <!--begin::Menu-->
                                    <a href="javascript:;" class="badge badge-secondary">Hak Akses
                                        ({{ $data->permissions_count }})</a>
                                    <a href="{{ route('user.index', ['role' => $data->id]) }}" class="badge badge-success">Daftar User ({{ $data->model_has_role_count }})</a>
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Header-->
                        </div>
                    </div>
                </div>
                <div id="role-id" data-role-id="{{ $data->id }}"></div>
                <div class="row g-5 g-xl-8">
                    @foreach ($dataPermission as $value)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="gap-2 card-body d-flex flex-column justify-content-between">
                                    <h3 class="m-0 card-title">{{ $value->group }}</h3>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 permission-group" data-group="{{ $value->group }}">
                                                <form id="checkboxForm">
                                                    @csrf
                                                    <div
                                                        class="mb-2 form-check form-check-custom form-check-solid form-check-sm">
                                                        <input type="hidden" id="roleId" value="{{ $data->id }}">
                                                        <input class="select-all form-check-input" type="checkbox"
                                                            value="" id="selectAll"
                                                            data-group="{{ $value->group }}" />
                                                        <label class="form-check-label" for="selectAll">
                                                            Semua Akses
                                                        </label>
                                                    </div>
                                                    @php
                                                        $names = explode(',', $value->names);
                                                        $displays = explode(',', $value->displays);
                                                        $id = explode(',', $value->id);
                                                    @endphp

                                                    @foreach ($names as $index => $name)
                                                        <div
                                                            class="mb-2 form-check form-check-custom form-check-solid form-check-sm">
                                                            <input
                                                                class="form-check-input permission-group permission-checkbox"
                                                                type="checkbox" name="permissions[]"
                                                                value="{{ $id[$index] }}" data-group="{{ $value->group }}"
                                                                id="{{ $id[$index] }}"
                                                                {{ in_array($id[$index], $data->permissions->pluck('id')->toArray()) ? 'checked' : null }} />
                                                            <label class="form-check-label" for="{{ $id[$index] }}">
                                                                {{ $displays[$index] }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".select-all").change(function() {
                let group = $(this).data("group");
                let checkboxes = $("[data-group='" + group + "'] .permission-checkbox");
                checkboxes.prop('checked', $(this).prop("checked"));
                updatePermissions();
            });

            $(".permission-checkbox").change(function() {
                let roleId = $('#role-id').data('role-id');
                let permissionId = $(this).val();
                let isChecked = $(this).prop('checked');

                if (isChecked) {
                    addSinglePermission(roleId, permissionId);
                } else {
                    removeSinglePermission(roleId, permissionId);
                }
            });

            function updatePermissions() {
                let roleId = $('#role-id').data('role-id');
                let permissions = [];
                $(".permission-checkbox:checked").each(function() {
                    permissions.push($(this).val());
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('role.updatePermissions') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        roleId: roleId,
                        permissions: permissions
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr) {
                        toastr.error(xhr.responseJSON.message || "Error updating permissions");
                    }
                });
            }

            function addSinglePermission(roleId, permissionId) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('role.updateSinglePermissions') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        roleId: roleId,
                        permissionId: permissionId
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr) {
                        toastr.error(xhr.responseJSON.message || "Error adding permission");
                    }
                });
            }

            function removeSinglePermission(roleId, permissionId) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('role.deletePermissions') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        roleId: roleId,
                        permissionId: permissionId
                    },
                    success: function(response) {
                        toastr.success(response.message);
                    },
                    error: function(xhr) {
                        toastr.error(xhr.responseJSON.message || "Error deleting permission");
                    }
                });
            }
        });
    </script>
@endsection
