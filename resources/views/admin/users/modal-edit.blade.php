<div class="modal fade" tabindex="-1" id="kt_modal_edit{{ $item->id }}">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pengguna</h5>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>

            <div class="modal-body">
                <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Photo -->
                    <div class="mb-3">
                        <label for="edit_photo_{{ $item->id }}" class="form-label">Foto</label>
                        <div class="d-flex align-items-center">
                            @if ($item->foto)
                                <img src="{{ asset($item->foto) }}" alt="Current Photo" class="rounded-circle"
                                    style="width: 50px; height: 45px; object-fit: cover; border: 2px solid #DBDFE9">
                            @else
                                <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="No Photo"
                                    class="rounded-circle"
                                    style="width: 50px; height: 45px; object-fit: cover; border: 2px solid #DBDFE9">
                            @endif
                            <input type="file" class="form-control ms-3" id="edit_photo_{{ $item->id }}"
                                name="foto">
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="edit_username_{{ $item->id }}" class="form-label">Username <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_username_{{ $item->id }}"
                            name="username" value="{{ $item->username }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="edit_email_{{ $item->id }}" class="form-label">Email <span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="edit_email_{{ $item->id }}" name="email"
                            value="{{ $item->email }}" required>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="edit_phone_{{ $item->id }}" class="form-label">Phone <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_phone_{{ $item->id }}" name="phone"
                            value="{{ $item->phone }}" required>
                    </div>

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="edit_name_{{ $item->id }}" class="form-label">Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_name_{{ $item->id }}" name="name"
                            value="{{ $item->name }}" required>
                    </div>

                    <!-- Password (Optional) -->
                    <div class="mb-3 position-relative">
                        <label for="edit_password_{{ $item->id }}" class="form-label">Password (Opsional)</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="edit_password_{{ $item->id }}"
                                name="password">
                            <button type="button" class="btn btn-outline-secondary"
                                id="toggleEditPassword_{{ $item->id }}" style="border: 1px solid #ced4da;">
                                <i class="ki-duotone ki-eye fs-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </button>
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <label for="edit_role_{{ $item->id }}" class="form-label">Role <span
                                class="text-danger">*</span></label>
                        <select class="form-control" id="edit_role_{{ $item->id }}" name="role" required>
                            <option disabled value="">Pilih Role</option>
                            @foreach ($role as $userRole)
                                <option value="{{ $userRole->name }}"
                                    {{ $item->hasRole($userRole->name) ? 'selected' : '' }}>
                                    {{ ucfirst($userRole->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Kelurahan -->
                    {{-- <div class="mb-3" id="kelurahan-select-{{ $item->id }}"
                        style="display: {{ $item->hasRole('Kelurahan') ? 'block' : 'none' }}">
                        <label for="edit_kelurahan_{{ $item->id }}" class="form-label">Kelurahan</label>
                        <select class="form-select" id="edit_kelurahan_{{ $item->id }}" data-control="select2"
                            data-dropdown-parent="#kt_modal_edit{{ $item->id }}" data-placeholder="Pilih Kelurahan"
                            data-allow-clear="true" name="kelurahan_id">
                            <option value="">Pilih Kelurahan</option>
                            @foreach ($kelurahan as $k)
                                <option value="{{ $k->id }}"
                                    {{ $item->kelurahan_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->name }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="px-0 modal-footer">
                        <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('toggleEditPassword_{{ $item->id }}').addEventListener('click', function() {
        const passwordField = document.getElementById('edit_password_{{ $item->id }}');
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
</script>
