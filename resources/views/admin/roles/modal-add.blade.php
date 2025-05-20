<div class="modal fade" tabindex="-1" id="kt_modal_add">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Jabatan</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form id="roleForm" action="{{ route('role.store') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Nama Role
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name">
                        <div class="mt-1 text-danger d-none" id="nameError"></div>
                    </div>

                    <div class="px-0 modal-footer">
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="validateForm()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        let isValid = true;

        const fields = [{
            id: 'name',
            errorId: 'nameError',
            name: 'Name'
        }];

        fields.forEach(field => {
            const input = document.getElementById(field.id);
            const errorDiv = document.getElementById(field.errorId);

            if (input.value.trim() === "") {
                errorDiv.classList.remove('d-none');
                errorDiv.textContent = `${field.name} tidak boleh kosong.`;
                isValid = false;
            } else {
                errorDiv.classList.add('d-none');
            }
        });

        if (isValid) {
            document.getElementById('roleForm').submit();
        }
    }
</script>
