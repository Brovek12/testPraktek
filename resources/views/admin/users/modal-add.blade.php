<div class="modal fade" id="kt_modal_add">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengguna</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form id="userForm" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">
                            Username
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="username" name="username">
                        <div class="mt-1 text-danger d-none" id="usernameError"></div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email
                            <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" id="email" name="email">
                        <div class="mt-1 text-danger d-none" id="emailError"></div>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">
                            Phone
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="phone" name="phone">
                        <div class="mt-1 text-danger d-none" id="phoneError"></div>
                    </div>

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Name
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name">
                        <div class="mt-1 text-danger d-none" id="nameError"></div>
                    </div>

                    <!-- Photo -->
                    <div class="mb-3">
                        <label for="foto" class="form-label">
                            Photo (Opsional)
                        </label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>

                    <!-- Password -->
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword"
                                style="border: 1px solid #ced4da;">
                                <i class="ki-duotone ki-eye fs-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </button>
                        </div>
                        <div class="mt-1 text-danger d-none" id="passwordError"></div>
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <label for="role" class="form-label">
                            Role
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-control" id="role" name="role">
                            <option selected disabled value="">Pilih Role</option>
                            @foreach ($role as $item)
                                <option value="{{ $item->name }}" {{ old('role') == $item->name ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="mt-1 text-danger d-none" id="roleError"></div>
                    </div>

                    <!-- Kelurahan -->
                    {{-- <div class="mb-3" id="kelurahanDiv" style="display: none;">
                        <label for="kelurahan" class="form-label">
                            Kelurahan
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select" id="kelurahan" name="kelurahan_id" data-control="select2"
                            data-dropdown-parent="#kt_modal_add" data-placeholder="Pilih Kelurahan"
                            data-allow-clear="true">
                            <option selected disabled value="">Pilih Kelurahan</option>
                            @foreach ($kelurahan as $k)
                                <option value="{{ $k->id }}">{{ $k->name }}</option>
                            @endforeach
                        </select>
                        <div class="mt-1 text-danger d-none" id="kelurahanError"></div>
                    </div> --}}

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
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('i');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('ki-eye');
            icon.classList.add('ki-eye-slash');
            if (icon.querySelector('.path4') === null) {
                icon.innerHTML += '<span class="path4"></span>';
            }
        } else {
            passwordField.type = 'password';
            icon.classList.remove('ki-eye-slash');
            icon.classList.add('ki-eye');
            const path4 = icon.querySelector('.path4');
            if (path4) {
                path4.remove();
            }
        }
    });

    function validateForm() {
        let isValid = true;

        const fields = [{
                id: 'username',
                errorId: 'usernameError',
                name: 'Username'
            },
            {
                id: 'email',
                errorId: 'emailError',
                name: 'Email'
            },
            {
                id: 'phone',
                errorId: 'phoneError',
                name: 'Phone',
                pattern: /^[0-9]{10,15}$/,
                message: 'Phone harus berisi angka 10-15 digit.'
            },
            {
                id: 'name',
                errorId: 'nameError',
                name: 'Name'
            },
            {
                id: 'password',
                errorId: 'passwordError',
                name: 'Password'
            },
            {
                id: 'role',
                errorId: 'roleError',
                name: 'Role'
            }
        ];

        fields.forEach(field => {
            const input = document.getElementById(field.id);
            const errorDiv = document.getElementById(field.errorId);

            if (field.id === 'phone' && field.pattern) {
                if (!field.pattern.test(input.value.trim())) {
                    errorDiv.classList.remove('d-none');
                    errorDiv.textContent = field.message || `${field.name} tidak valid.`;
                    isValid = false;
                } else {
                    errorDiv.classList.add('d-none');
                }
            } else if (input.value.trim() === "") {
                errorDiv.classList.remove('d-none');
                errorDiv.textContent = `${field.name} tidak boleh kosong.`;
                isValid = false;
            } else {
                errorDiv.classList.add('d-none');
            }
        });

        if (isValid) {
            document.getElementById('userForm').submit();
        }
    }
</script>
