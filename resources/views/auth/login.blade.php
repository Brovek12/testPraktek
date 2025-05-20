@extends('layouts.app-auth')
@section('title', 'Login')
@section('style')
    <style>
        .input-group {
            position: relative;
        }

        .input-group .btn {
            z-index: 10;
            background: transparent;
        }

        .input-group .form-control {
            padding-right: 40px;
        }
    </style>
@endsection

@section('content')

    <form action="{{ route('login') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <div class="pt-20 pb-20 mt-20 mb-20 d-flex flex-column">
            <img alt="Logo" src="assets/media/logos/favicon.ico" style="height: 80px; width: 80px" class="mt-12" />
            <span class="mt-4 mb-2 text-gray-900 fs-2 fw-bold">Masuk</span>

            <span class="text-gray-600 fs-5">Silahkan masukkan username dan password anda.</span>

            @if (session('ERROR'))
                <div class="mt-4 alert alert-danger d-flex align-items-center me-6" style="width: 97%;" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-2 me-2"></i>
                    <div>
                        {{ session('ERROR') }}
                    </div>
                </div>
            @endif


            <div class="mt-6 form-group">
                {{-- <label class="mt-6 text-gray-700 form-label fs-4">Username</label> --}}
                <input type="text" name="username" id="username" class="form-control form-control-solid me-6" style="width: 97%;" placeholder="Username">
                @if ($errors->has('username'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>

            <div class="mt-6 form-group">
                {{-- <label class="mt-6 text-gray-700 form-label fs-4">Password</label> --}}
                <div class="input-group me-6" style="width: 97%;">
                    <input type="password" name="password" id="password" class="form-control form-control-solid" placeholder="Password">
                    <button class="btn btn-default position-absolute top-50 end-0 translate-middle-y" tabindex="-1" type="button" onclick="togglePassword(this);">
                        <i class="bi bi-eye fs-3"></i>
                    </button>
                </div>
                @if ($errors->has('password'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>


            <button class="w-full mt-10 mb-6 btn btn-primary" type="submit">Login</button>
            <a href="#" class="m-3 text-center link-primary">Lupa Password?</a>
        </div>
    </form>



@endsection

@section('script')

    <script>
        function togglePassword(button) {
            const passwordField = button.parentElement.querySelector('input');
            const icon = button.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-fill');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('bi-eye-fill');
                icon.classList.add('bi-eye');
            }
        }
    </script>

@endsection
