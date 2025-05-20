<div class="modal fade" tabindex="-1" id="kt_modal_edit{{ $role->id }}">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Jabatan</h5>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>

            <div class="modal-body">
                <form action="{{ route('role.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="edit_name_{{ $role->id }}" class="form-label">Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_name_{{ $role->id }}" name="name"
                            value="{{ $role->name }}" required>
                    </div>

                    <div class="px-0 modal-footer">
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
