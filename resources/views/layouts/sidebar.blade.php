<div id="kt_aside" class="bg-white border aside border-right-1" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Aside Toolbarl-->
    <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
        <!--begin::Aside user-->
        <!--begin::User-->
        <div class="py-5 aside-user d-flex align-items-sm-center justify-content-center" style="border: none;">
            <!--begin::Symbol-->
            <div class="symbol symbol-35px symbol-circle">
                @if (Auth::user()->foto)
                    <img src="{{ asset(Auth::user()->foto) }}" alt="User foto" class="symbol-label" />
                @else
                    @php
                        $user = Auth::user();
                        $nameParts = explode(' ', $user->name);
                        $initials = strtoupper(
                            substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''),
                        );
                    @endphp
                    <div class="symbol-label fs-2 fw-semibold bg-primary text-inverse-danger">{{ $initials }}</div>
                @endif
            </div>
            <!--end::Symbol-->
            <!--begin::Wrapper-->
            <div class="flex-wrap aside-user-info flex-row-fluid ms-5">
                <!--begin::Section-->
                <div class="d-flex">
                    <!--begin::Info-->
                    <div class="flex-grow-1 me-2">
                        <!--begin::Username-->
                        <a href="#"
                            class="text-gray-700 text-hover-primary fs-8 fw-bold">{{ Auth::user()->name }}</a>
                        <!--end::Username-->
                        <!--begin::Description-->
                        <span class="mb-1 text-gray-600 fw-semibold d-block fs-8">Superadmin</span>
                        <!--end::Description-->
                        <!--begin::Label-->
                        {{-- <div class="d-flex align-items-center text-success fs-9">
                            <span class="bullet bullet-dot bg-success me-1"></span>online
                        </div> --}}
                        <!--end::Label-->
                    </div>
                    <!--end::Info-->
                    <!--begin::User menu-->
                    <div class="me-n2">
                        <!--begin::Action-->
                        <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            data-kt-menu-overflow="true">
                            <i class="ki-duotone ki-entrance-right text-muted fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                        <!--begin::User account menu-->
                        <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold fs-6 w-275px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="px-5 my-1 menu-item">
                                <a href="account/settings.html" class="px-5 menu-link">Account
                                    Settings</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="px-5 menu-item">
                                <a href="{{ route('logout') }}" class="px-5 menu-link"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                    Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::User account menu-->
                        <!--end::Action-->
                    </div>
                    <!--end::User menu-->
                </div>
                <!--end::Section-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::User-->
        <!--end::Aside user-->
    </div>
    <!--end::Aside Toolbarl-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="mx-3 my-5 hover-scroll-overlay-y my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
            data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <!--begin:Menu item-->
                @can('read-dashboard')
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link text-hover-primary" href="{{ route('dashboard') }}">
                            <span class="menu-icon">
                                <i
                                    class="{{ Route::is('dashboard') ? 'text-primary' : 'text-gray-700' }} ki-duotone ki-element-11 fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </span>
                            <span
                                class="{{ Route::is('dashboard') ? 'text-primary' : 'text-gray-700 ' }} text-hover-primary menu-title">Dashboard</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                @endcan
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="pt-5 menu-item">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Menu Utama</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                {{-- @can('read-kendala')
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link text-hover-primary" href="{{ route('kendala-aplikasi.index') }}">
                            <span class="menu-icon">
                                <i
                                    class="{{ Route::is('kendala-aplikasi*') ? 'text-primary' : 'text-gray-700' }} bi bi-link-45deg fs-2"></i>
                            </span>
                            <span
                                class="{{ Route::is('kendala-aplikasi*') ? 'text-primary' : 'text-gray-700' }} text-hover-primary menu-title">
                                Kendala Aplikasi
                            </span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                @endcan --}}
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="pt-5 menu-item">
                    <!--begin:Menu content-->
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Konfigurasi</span>
                    </div>
                    <!--end:Menu content-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                @can('read-users')
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link text-hover-primary" href="{{ route('user.index') }}">
                            <span class="menu-icon">
                                <i
                                    class="{{ Route::is('user*') ? 'text-primary' : 'text-gray-700' }} fa fa-user-shield fs-2"></i>
                            </span>
                            <span
                                class="{{ Route::is('user*') ? 'text-primary' : 'text-gray-700' }} text-hover-primary menu-title">Pengguna</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                @endcan
                <!--end:Menu item-->
                <!--begin:Menu item-->
                @can('read-roles')
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link text-hover-primary" href="{{ route('role.index') }}">
                            <span class="menu-icon">
                                <i
                                    class="{{ Route::is('role*') ? 'text-primary' : 'text-gray-700' }} fa fa-lock-open fs-2"></i>
                            </span>
                            <span
                                class="{{ Route::is('role*') ? 'text-primary' : 'text-gray-700' }} text-hover-primary menu-title">Jabatan
                                & Hak Akses</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                @endcan
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    {{-- <div class="p-0 aside-footer flex-column-auto" id="kt_aside_footer">
        <div class="aside-footer-content">
            <!-- Tambahkan konten footer lain jika ada -->
        </div>
    </div> --}}
    <!--end::Footer-->
</div>
