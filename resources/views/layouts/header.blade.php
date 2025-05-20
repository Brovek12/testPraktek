<div id="kt_header" class="header align-items-stretch">
    <!--begin::Brand-->
    <div class="bg-white header-brand" style="border-bottom: 0.1px solid rgb(205, 205, 205)">
        <!--begin::Logo-->
        <div class="gap-1 d-flex justify-content-center align-items-center">
            <a href="#">
                <img alt="Logo" src="{{ asset('assets/media/logos/favicon.ico') }}" class="h-30px h-lg-30px" />
            </a>
            <a href="#" class="mx-3 text-gray-900 fw-bold fs-4">
                NAJ Inventory
            </a>
        </div>
        <!--end::Logo-->
        <!--begin::Aside minimize-->
        {{-- <div id="kt_aside_toggle" class="w-auto px-0 btn btn-icon btn-active-color-primary aside-minimize"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <i class="ki-duotone ki-entrance-right fs-1 me-n1 minimize-default">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <i class="ki-duotone ki-entrance-left fs-1 minimize-active">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div> --}}
        <!--end::Aside minimize-->
        <!--begin::Aside toggle-->
        <div class="d-flex align-items-center d-lg-none me-n2" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
        </div>
        <!--end::Aside toggle-->
    </div>
    <!--end::Brand-->
    <!--begin::Toolbar-->
    <div class="toolbar d-flex align-items-stretch position-relative">
        <!--begin::Toolbar container-->
        {{-- <img src="{{ asset('assets/media/patterns/header.png') }}" alt="bg-img" class="position-absolute"
            style="z-index: -1; width: 100%; max-height: 74px; object-fit: cover;"> --}}
        <div
            class="py-6 container-xxl py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">
            <!--begin::Page title-->
            <div class="page-title d-flex align-items-center justify-content-start me-5">
                <!--begin::Text Content-->
                <div class="d-flex flex-column me-3">
                    <!--begin::Title-->
                    <h1 class="mb-0 text-gray-900 fw-bold fs-3">
                        @yield('pageTitle')
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="pt-1 breadcrumb breadcrumb-separatorless fw-semibold fs-7 d-flex align-items-center">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            @yield('mainSection')
                        </li>
                        <!--end::Item-->
                        <!--begin::Separator-->
                        <li class="breadcrumb-item">
                            <span class="bg-gray-300 bullet w-5px h-2px"></span>
                        </li>
                        <!--end::Separator-->
                        <!--begin::Item-->
                        <li class="text-gray-900 breadcrumb-item">
                            @yield('currentSection')
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Text Content-->

                <!--begin::Image-->
                {{-- <img src="{{ asset('assets/media/logos/logo-bpn-nyaman.png') }}" alt="Logo"
                    style="width: auto; max-height: 40px; margin-left: 1rem;"> --}}
                <!--end::Image-->
            </div>
            <!--end::Page title-->
            <!--begin::Action group-->
            <div class="pt-3 overflow-auto d-flex align-items-stretch pt-lg-0">
                <!-- Your existing Action group content here -->
            </div>
            <!--end::Action group-->
        </div>
        <!--end::Toolbar container-->
    </div>

    <!--end::Toolbar-->
</div>
