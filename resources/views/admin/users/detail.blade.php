@extends('layouts.app')
@section('title', 'Pengguna Aplikasi')
@section('style')

@endsection

@section('pageTitle', 'Pengguna')
@section('mainSection', 'Konfigurasi')
@section('currentSection', 'Detail Pengguna')

@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Navbar-->
                <div class="mb-5 card mb-xxl-8">
                    <div class="pb-0 card-body pt-9">
                        <!--begin::Details-->
                        <div class="flex-wrap d-flex flex-sm-nowrap">
                            <!--begin: Pic-->
                            <div class="mb-4 me-7">
                                <div class="symbol symbol-40px symbol-lg-100px symbol-fixed position-relative">
                                    @if ($user->foto)
                                        <img src="{{ asset($user->foto) }}" alt="image" style="object-fit: cover" />
                                    @else
                                        <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="No Foto" style="object-fit: cover" />
                                    @endif
                                    <div
                                        class="bottom-0 mb-6 border border-4 position-absolute translate-middle start-100 bg-success rounded-circle border-body h-20px w-20px">
                                    </div>
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="flex-wrap mb-2 d-flex justify-content-between align-items-start">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="mb-2 d-flex align-items-center">
                                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
                                                {{ $user->name }}
                                            </a>
                                            <a href="#">
                                                <i class="ki-duotone ki-verify fs-1 text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="flex-wrap mb-4 d-flex fw-semibold fs-6 pe-2">
                                            <a href="#"
                                                class="mb-2 text-gray-500 d-flex align-items-center text-hover-primary me-5">
                                                <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>{{ $user->getRoleNames()->first() ?? 'N/A' }}</a>
                                            <a href="#"
                                                class="mb-2 text-gray-500 d-flex align-items-center text-hover-primary me-5">
                                                <i class="ki-duotone ki-telephone-geolocation fs-4 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>{{ $user->phone }}</a>
                                            <a href="#"
                                                class="mb-2 text-gray-500 d-flex align-items-center text-hover-primary">
                                                <i class="ki-duotone ki-sms fs-4 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>{{ $user->email }}</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Actions-->
                                    <div class="my-4 d-flex">
                                        <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_offer_a_deal">Edit</a>
                                        <!--begin::Menu-->
                                        <div class="me-0">
                                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="ki-solid ki-dots-horizontal fs-2x"></i>
                                            </button>
                                            <!--begin::Menu 3-->
                                            <div class="py-3 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                data-kt-menu="true">
                                                <!--begin::Heading-->
                                                <div class="px-3 menu-item">
                                                    <div class="px-3 pb-2 menu-content text-muted fs-7 text-uppercase">
                                                        Payments</div>
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Menu item-->
                                                <div class="px-3 menu-item">
                                                    <a href="#" class="px-3 menu-link">Create Invoice</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="px-3 menu-item">
                                                    <a href="#" class="px-3 menu-link flex-stack">Create Payment
                                                        <span class="ms-2" data-bs-toggle="tooltip"
                                                            title="Specify a target name for future usage and reference">
                                                            <i class="ki-duotone ki-information fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span></a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="px-3 menu-item">
                                                    <a href="#" class="px-3 menu-link">Generate Bill</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="px-3 menu-item" data-kt-menu-trigger="hover"
                                                    data-kt-menu-placement="right-end">
                                                    <a href="#" class="px-3 menu-link">
                                                        <span class="menu-title">Subscription</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--begin::Menu sub-->
                                                    <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                                                        <!--begin::Menu item-->
                                                        <div class="px-3 menu-item">
                                                            <a href="#" class="px-3 menu-link">Plans</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="px-3 menu-item">
                                                            <a href="#" class="px-3 menu-link">Billing</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="px-3 menu-item">
                                                            <a href="#" class="px-3 menu-link">Statements</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu separator-->
                                                        <div class="my-2 separator"></div>
                                                        <!--end::Menu separator-->
                                                        <!--begin::Menu item-->
                                                        <div class="px-3 menu-item">
                                                            <div class="px-3 menu-content">
                                                                <!--begin::Switch-->
                                                                <label
                                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input w-30px h-20px"
                                                                        type="checkbox" value="1" checked="checked"
                                                                        name="notifications" />
                                                                    <!--end::Input-->
                                                                    <!--end::Label-->
                                                                    <span
                                                                        class="form-check-label text-muted fs-6">Recuring</span>
                                                                    <!--end::Label-->
                                                                </label>
                                                                <!--end::Switch-->
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="px-3 my-1 menu-item">
                                                    <a href="#" class="px-3 menu-link">Settings</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 3-->
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Navs-->
                        <ul class="border-transparent nav nav-stretch nav-line-tabs nav-line-tabs-2x fs-5 fw-bold">
                            <!--begin::Nav item-->
                            <li class="mt-2 nav-item">
                                <a class="py-5 nav-link text-active-primary ms-0 me-10 active"
                                    href="#">Overview</a>
                            </li>
                            <!--end::Nav item-->
                        </ul>
                        <!--begin::Navs-->
                    </div>
                </div>
                <!--end::Navbar-->
                <!--begin::Row-->
                <div class="row g-5 g-xxl-8">
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <!--begin::Feeds Widget 1-->
                        <div class="mb-5 card mb-xxl-8">
                            <!--begin::Body-->
                            <div class="pb-0 card-body">
                                <!--begin::Header-->
                                <div class="d-flex align-items-center">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-45px me-5">
                                            <img src="assets/media/avatars/300-6.jpg" alt="" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">Grace
                                                Green</a>
                                            <span class="text-gray-500 fw-bold">PHP, SQLite, Artisan CLI</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Menu-->
                                    <div class="my-0">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-category fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </button>
                                        <!--begin::Menu 2-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 py-4 text-gray-900 menu-content fs-6 fw-bold">Quick
                                                    Actions</div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="mb-3 opacity-75 separator"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Ticket</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Customer</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item" data-kt-menu-trigger="hover"
                                                data-kt-menu-placement="right-start">
                                                <!--begin::Menu item-->
                                                <a href="#" class="px-3 menu-link">
                                                    <span class="menu-title">New Group</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--end::Menu item-->
                                                <!--begin::Menu sub-->
                                                <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Admin Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Staff Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Member Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Contact</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="mt-3 opacity-75 separator"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 py-3 menu-content">
                                                    <a class="px-4 btn btn-primary btn-sm" href="#">Generate
                                                        Reports</a>
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 2-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Form-->
                                <form id="kt_forms_widget_1_form" class="pb-3 ql-quil ql-quil-plain">
                                    <!--begin::Editor-->
                                    <div id="kt_forms_widget_1_editor" class="py-6"></div>
                                    <!--end::Editor-->
                                    <div class="separator"></div>
                                    <!--begin::Toolbar-->
                                    <div id="kt_forms_widget_1_editor_toolbar" class="py-2 ql-toolbar d-flex flex-stack">
                                        <div class="me-2">
                                            <span class="ql-formats ql-size ms-0">
                                                <select class="ql-size w-75px"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-bold"></button>
                                                <button class="ql-italic"></button>
                                                <button class="ql-underline"></button>
                                                <button class="ql-strike"></button>
                                                <button class="ql-image"></button>
                                                <button class="ql-link"></button>
                                                <button class="ql-clean"></button>
                                            </span>
                                        </div>
                                        <div class="me-n3">
                                            <span class="btn btn-icon btn-sm btn-active-color-primary">
                                                <i class="ki-duotone ki-paper-clip fs-2"></i>
                                            </span>
                                            <span class="btn btn-icon btn-sm btn-active-color-primary">
                                                <i class="ki-duotone ki-geolocation fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Toolbar-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Feeds Widget 1-->
                        <!--begin::Feeds Widget 2-->
                        <div class="mb-5 card mb-xxl-8">
                            <!--begin::Body-->
                            <div class="pb-0 card-body">
                                <!--begin::Header-->
                                <div class="mb-5 d-flex align-items-center">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-45px me-5">
                                            <img src="assets/media/avatars/300-23.jpg" alt="" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">Nick
                                                Logan</a>
                                            <span class="text-gray-500 fw-bold">PHP, SQLite, Artisan CLI</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Menu-->
                                    <div class="my-0">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-category fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </button>
                                        <!--begin::Menu 2-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 py-4 text-gray-900 menu-content fs-6 fw-bold">Quick
                                                    Actions</div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="mb-3 opacity-75 separator"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Ticket</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Customer</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item" data-kt-menu-trigger="hover"
                                                data-kt-menu-placement="right-start">
                                                <!--begin::Menu item-->
                                                <a href="#" class="px-3 menu-link">
                                                    <span class="menu-title">New Group</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--end::Menu item-->
                                                <!--begin::Menu sub-->
                                                <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Admin Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Staff Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Member Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Contact</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="mt-3 opacity-75 separator"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 py-3 menu-content">
                                                    <a class="px-4 btn btn-primary btn-sm" href="#">Generate
                                                        Reports</a>
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 2-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Post-->
                                <div class="mb-5">
                                    <!--begin::Text-->
                                    <p class="mb-5 text-gray-800 fw-normal">Outlines keep you honest. They stop you from
                                        indulging in poorly thought-out metaphors about driving and keep you focused on the
                                        overall structure of your post</p>
                                    <!--end::Text-->
                                    <!--begin::Toolbar-->
                                    <div class="mb-5 d-flex align-items-center">
                                        <a href="#"
                                            class="px-4 py-2 btn btn-sm btn-light btn-color-muted btn-active-light-success me-4">
                                            <i class="ki-duotone ki-message-text-2 fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>120</a>
                                        <a href="#"
                                            class="px-4 py-2 btn btn-sm btn-light btn-color-muted btn-active-light-danger">
                                            <i class="ki-duotone ki-heart fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>15</a>
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Post-->
                                <!--begin::Separator-->
                                <div class="mb-4 separator"></div>
                                <!--end::Separator-->
                                <!--begin::Reply input-->
                                <form class="mb-6 position-relative">
                                    <textarea class="p-0 border-0 resize-none form-control pe-10 min-h-25px" data-kt-autosize="true" rows="1"
                                        placeholder="Reply.."></textarea>
                                    <div class="top-0 position-absolute end-0 me-n5">
                                        <span class="btn btn-icon btn-sm btn-active-color-primary pe-0 me-2">
                                            <i class="mb-3 ki-duotone ki-paper-clip fs-2"></i>
                                        </span>
                                        <span class="btn btn-icon btn-sm btn-active-color-primary ps-0">
                                            <i class="mb-3 ki-duotone ki-geolocation fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                </form>
                                <!--edit::Reply input-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Feeds Widget 2-->
                        <!--begin::Feeds Widget 3-->
                        <div class="mb-5 card mb-xxl-8">
                            <!--begin::Body-->
                            <div class="pb-0 card-body">
                                <!--begin::Header-->
                                <div class="mb-3 d-flex align-items-center">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-45px me-5">
                                            <img src="assets/media/avatars/300-21.jpg" alt="" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">Carles
                                                Nilson</a>
                                            <span class="text-gray-500 fw-bold">Yestarday at 5:06 PM</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Menu-->
                                    <div class="my-0">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-category fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </button>
                                        <!--begin::Menu 2-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 py-4 text-gray-900 menu-content fs-6 fw-bold">Quick
                                                    Actions</div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="mb-3 opacity-75 separator"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Ticket</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Customer</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item" data-kt-menu-trigger="hover"
                                                data-kt-menu-placement="right-start">
                                                <!--begin::Menu item-->
                                                <a href="#" class="px-3 menu-link">
                                                    <span class="menu-title">New Group</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--end::Menu item-->
                                                <!--begin::Menu sub-->
                                                <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Admin Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Staff Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Member Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Contact</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="mt-3 opacity-75 separator"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 py-3 menu-content">
                                                    <a class="px-4 btn btn-primary btn-sm" href="#">Generate
                                                        Reports</a>
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 2-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Post-->
                                <div class="mb-7">
                                    <!--begin::Text-->
                                    <div class="mb-5 text-gray-800">Outlines keep you honest. They stop you from indulging
                                        in poorly thought-out metaphors about driving and keep you focused on the overall
                                        structure of your post</div>
                                    <!--end::Text-->
                                    <!--begin::Toolbar-->
                                    <div class="mb-5 d-flex align-items-center">
                                        <a href="#"
                                            class="px-4 py-2 btn btn-sm btn-light btn-color-muted btn-active-light-success me-4">
                                            <i class="ki-duotone ki-message-text-2 fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>12</a>
                                        <a href="#"
                                            class="px-4 py-2 btn btn-sm btn-light btn-color-muted btn-active-light-danger">
                                            <i class="ki-duotone ki-heart fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>150</a>
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Post-->
                                <!--begin::Replies-->
                                <div class="mb-7">
                                    <!--begin::Reply-->
                                    <div class="mb-5 d-flex">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-45px me-5">
                                            <img src="assets/media/avatars/300-14.jpg" alt="" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column flex-row-fluid">
                                            <!--begin::Info-->
                                            <div class="flex-wrap mb-1 d-flex align-items-center">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fw-bold me-2">Alice Danchik</a>
                                                <span class="text-gray-500 fw-semibold fs-7">1 day</span>
                                                <a href="#"
                                                    class="text-gray-500 ms-auto text-hover-primary fw-semibold fs-7">Reply</a>
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Post-->
                                            <span class="pt-1 text-gray-800 fs-7 fw-normal">Long before you sit dow to put
                                                digital pen to paper you need to make sure you have to sit down and
                                                write.</span>
                                            <!--end::Post-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Reply-->
                                    <!--begin::Reply-->
                                    <div class="d-flex">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-45px me-5">
                                            <img src="assets/media/avatars/300-9.jpg" alt="" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column flex-row-fluid">
                                            <!--begin::Info-->
                                            <div class="flex-wrap mb-1 d-flex align-items-center">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fw-bold me-2">Harris Bold</a>
                                                <span class="text-gray-500 fw-semibold fs-7">2 days</span>
                                                <a href="#"
                                                    class="text-gray-500 ms-auto text-hover-primary fw-semibold fs-7">Reply</a>
                                            </div>
                                            <!--end::Info-->
                                            <!--begin::Post-->
                                            <span class="pt-1 text-gray-800 fs-7 fw-normal">Outlines keep you honest. They
                                                stop you from indulging in poorly</span>
                                            <!--end::Post-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Reply-->
                                </div>
                                <!--end::Replies-->
                                <!--begin::Separator-->
                                <div class="mb-4 separator"></div>
                                <!--end::Separator-->
                                <!--begin::Reply input-->
                                <form class="mb-6 position-relative">
                                    <textarea class="p-0 border-0 resize-none form-control pe-10 min-h-25px" data-kt-autosize="true" rows="1"
                                        placeholder="Reply.."></textarea>
                                    <div class="top-0 position-absolute end-0 me-n5">
                                        <span class="btn btn-icon btn-sm btn-active-color-primary pe-0 me-2">
                                            <i class="mb-3 ki-duotone ki-paper-clip fs-2"></i>
                                        </span>
                                        <span class="btn btn-icon btn-sm btn-active-color-primary ps-0">
                                            <i class="mb-3 ki-duotone ki-geolocation fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                </form>
                                <!--edit::Reply input-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Feeds Widget 3-->
                        <!--begin::Feeds Widget 4-->
                        <div class="mb-5 card mb-xxl-8">
                            <!--begin::Body-->
                            <div class="pb-0 card-body">
                                <!--begin::Header-->
                                <div class="mb-5 d-flex align-items-center">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-45px me-5">
                                            <img src="assets/media/avatars/300-7.jpg" alt="" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">Carles
                                                Nilson</a>
                                            <span class="text-gray-500 fw-bold">Last week at 10:00 PM</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Menu-->
                                    <div class="my-0">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-category fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </button>
                                        <!--begin::Menu 3-->
                                        <div class="py-3 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                            data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 pb-2 menu-content text-muted fs-7 text-uppercase">Payments
                                                </div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link flex-stack">Create Payment
                                                    <span class="ms-2" data-bs-toggle="tooltip"
                                                        title="Specify a target name for future usage and reference">
                                                        <i class="ki-duotone ki-information fs-6">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item" data-kt-menu-trigger="hover"
                                                data-kt-menu-placement="right-end">
                                                <a href="#" class="px-3 menu-link">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="my-2 separator"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <div class="px-3 menu-content">
                                                            <!--begin::Switch-->
                                                            <label
                                                                class="form-check form-switch form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input w-30px h-20px"
                                                                    type="checkbox" value="1" checked="checked"
                                                                    name="notifications" />
                                                                <!--end::Input-->
                                                                <!--end::Label-->
                                                                <span
                                                                    class="form-check-label text-muted fs-6">Recuring</span>
                                                                <!--end::Label-->
                                                            </label>
                                                            <!--end::Switch-->
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 my-1 menu-item">
                                                <a href="#" class="px-3 menu-link">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Post-->
                                <div class="mb-7">
                                    <!--begin::Text-->
                                    <div class="mb-5 text-gray-800">Outlines keep you honest. They stop you from indulging
                                        in poorly thought-out metaphors about driving and keep you focused on the overall
                                        structure of your post</div>
                                    <!--end::Text-->
                                    <!--begin::Toolbar-->
                                    <div class="mb-5 d-flex align-items-center">
                                        <a href="#"
                                            class="px-4 py-2 btn btn-sm btn-light btn-color-muted btn-active-light-success me-4">
                                            <i class="ki-duotone ki-message-text-2 fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>22</a>
                                        <a href="#"
                                            class="px-4 py-2 btn btn-sm btn-light btn-color-muted btn-active-light-danger">
                                            <i class="ki-duotone ki-heart fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>59</a>
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Post-->
                                <!--begin::Separator-->
                                <div class="mb-4 separator"></div>
                                <!--end::Separator-->
                                <!--begin::Reply input-->
                                <form class="mb-6 position-relative">
                                    <textarea class="p-0 border-0 resize-none form-control pe-10 min-h-25px" data-kt-autosize="true" rows="1"
                                        placeholder="Reply.."></textarea>
                                    <div class="top-0 position-absolute end-0 me-n5">
                                        <span class="btn btn-icon btn-sm btn-active-color-primary pe-0 me-2">
                                            <i class="mb-3 ki-duotone ki-paper-clip fs-2"></i>
                                        </span>
                                        <span class="btn btn-icon btn-sm btn-active-color-primary ps-0">
                                            <i class="mb-3 ki-duotone ki-geolocation fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                </form>
                                <!--edit::Reply input-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Feeds Widget 4-->
                        <!--begin::Feeds widget 5-->
                        <div class="card d-none" id="kt_widget_5">
                            <!--begin::Body-->
                            <div class="pb-0 card-body">
                                <!--begin::Header-->
                                <div class="mb-5 d-flex align-items-center">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-45px me-5">
                                            <img src="assets/media/avatars/300-7.jpg" alt="" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Carles
                                                Nilson</a>
                                            <span class="text-gray-500 fw-bold">Last week at 10:00 PM</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Menu-->
                                    <div class="my-0">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-category fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </button>
                                        <!--begin::Menu 2-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 py-4 text-gray-900 menu-content fs-6 fw-bold">Quick
                                                    Actions</div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="mb-3 opacity-75 separator"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Ticket</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Customer</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item" data-kt-menu-trigger="hover"
                                                data-kt-menu-placement="right-start">
                                                <!--begin::Menu item-->
                                                <a href="#" class="px-3 menu-link">
                                                    <span class="menu-title">New Group</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--end::Menu item-->
                                                <!--begin::Menu sub-->
                                                <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Admin Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Staff Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="px-3 menu-item">
                                                        <a href="#" class="px-3 menu-link">Member Group</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <a href="#" class="px-3 menu-link">New Contact</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="mt-3 opacity-75 separator"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="px-3 menu-item">
                                                <div class="px-3 py-3 menu-content">
                                                    <a class="px-4 btn btn-primary btn-sm" href="#">Generate
                                                        Reports</a>
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 2-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Post-->
                                <div class="mb-7">
                                    <!--begin::Image-->
                                    <div class="mb-5 rounded bgi-no-repeat bgi-size-cover min-h-250px"
                                        style="background-image:url('assets/media/stock/900x600/19.jpg');"></div>
                                    <!--end::Image-->
                                    <!--begin::Text-->
                                    <div class="mb-5 text-gray-800">Outlines keep you honest. They stop you from indulging
                                        in poorly thought-out metaphors about driving and keep you focused on the overall
                                        structure of your post</div>
                                    <!--end::Text-->
                                    <!--begin::Toolbar-->
                                    <div class="mb-5 d-flex align-items-center">
                                        <a href="#"
                                            class="px-4 py-2 btn btn-sm btn-light btn-color-muted btn-active-light-success me-4">
                                            <i class="ki-duotone ki-message-text-2 fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>20</a>
                                        <a href="#"
                                            class="px-4 py-2 btn btn-sm btn-light btn-color-muted btn-active-light-danger">
                                            <i class="ki-duotone ki-heart fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>50</a>
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Post-->
                                <!--begin::Separator-->
                                <div class="mb-4 separator"></div>
                                <!--end::Separator-->
                                <!--begin::Reply input-->
                                <form class="mb-6 position-relative">
                                    <textarea class="p-0 border-0 resize-none form-control pe-10 min-h-25px" data-kt-autosize="true" rows="1"
                                        placeholder="Reply.."></textarea>
                                    <div class="top-0 position-absolute end-0 me-n5">
                                        <span class="btn btn-icon btn-sm btn-active-color-primary pe-0 me-2">
                                            <i class="mb-3 ki-duotone ki-paper-clip fs-2"></i>
                                        </span>
                                        <span class="btn btn-icon btn-sm btn-active-color-primary ps-0">
                                            <i class="mb-3 ki-duotone ki-geolocation fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                </form>
                                <!--edit::Reply input-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Feeds widget 5-->
                        <!--begin::Feeds widget 4, 5 load more-->
                        <button class="text-center btn btn-primary w-100" id="kt_widget_5_load_more_btn">
                            <span class="indicator-label">More Feeds</span>
                            <span class="indicator-progress">Loading...
                                <span class="align-middle spinner-border spinner-border-sm ms-2"></span></span>
                        </button>
                        <!--end::Feeds widget 4, 5 load more-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-6">
                        <!--begin::Charts Widget 1-->
                        <div class="mb-5 card mb-xxl-8">
                            <!--begin::Header-->
                            <div class="pt-5 border-0 card-header">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="mb-1 card-label fw-bold fs-3">Recent Statistics</span>
                                    <span class="text-muted fw-semibold fs-7">More than 400 new members</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button type="button"
                                        class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-category fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </button>
                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                        id="kt_menu_671751e0db330">
                                        <!--begin::Header-->
                                        <div class="py-5 px-7">
                                            <div class="text-gray-900 fs-5 fw-bold">Filter Options</div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Menu separator-->
                                        <div class="border-gray-200 separator"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Form-->
                                        <div class="py-5 px-7">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-semibold">Status:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div>
                                                    <select class="form-select form-select-solid" multiple="multiple"
                                                        data-kt-select2="true" data-close-on-select="false"
                                                        data-placeholder="Select option"
                                                        data-dropdown-parent="#kt_menu_671751e0db330"
                                                        data-allow-clear="true">
                                                        <option></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="2">In Process</option>
                                                        <option value="2">Rejected</option>
                                                    </select>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-semibold">Member Type:</label>
                                                <!--end::Label-->
                                                <!--begin::Options-->
                                                <div class="d-flex">
                                                    <!--begin::Options-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                        <span class="form-check-label">Author</span>
                                                    </label>
                                                    <!--end::Options-->
                                                    <!--begin::Options-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="2"
                                                            checked="checked" />
                                                        <span class="form-check-label">Customer</span>
                                                    </label>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-semibold">Notifications:</label>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <div
                                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        name="notifications" checked="checked" />
                                                    <label class="form-check-label">Enabled</label>
                                                </div>
                                                <!--end::Switch-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                    data-kt-menu-dismiss="true">Reset</button>
                                                <button type="submit" class="btn btn-sm btn-primary"
                                                    data-kt-menu-dismiss="true">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Menu 1-->
                                    <!--end::Menu-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Chart-->
                                <div id="kt_charts_widget_1_chart" style="height: 350px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Charts Widget 1-->
                        <!--begin::List Widget 5-->
                        <div class="mb-5 card mb-xxl-8">
                            <!--begin::Header-->
                            <div class="mt-4 border-0 card-header align-items-center">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="mb-2 text-gray-900 fw-bold">Activities</span>
                                    <span class="text-muted fw-semibold fs-7">890,344 Sales</span>
                                </h3>
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button type="button"
                                        class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-category fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </button>
                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                        id="kt_menu_671751e0db406">
                                        <!--begin::Header-->
                                        <div class="py-5 px-7">
                                            <div class="text-gray-900 fs-5 fw-bold">Filter Options</div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Menu separator-->
                                        <div class="border-gray-200 separator"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Form-->
                                        <div class="py-5 px-7">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-semibold">Status:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div>
                                                    <select class="form-select form-select-solid" multiple="multiple"
                                                        data-kt-select2="true" data-close-on-select="false"
                                                        data-placeholder="Select option"
                                                        data-dropdown-parent="#kt_menu_671751e0db406"
                                                        data-allow-clear="true">
                                                        <option></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="2">In Process</option>
                                                        <option value="2">Rejected</option>
                                                    </select>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-semibold">Member Type:</label>
                                                <!--end::Label-->
                                                <!--begin::Options-->
                                                <div class="d-flex">
                                                    <!--begin::Options-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                        <span class="form-check-label">Author</span>
                                                    </label>
                                                    <!--end::Options-->
                                                    <!--begin::Options-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="2"
                                                            checked="checked" />
                                                        <span class="form-check-label">Customer</span>
                                                    </label>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-semibold">Notifications:</label>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <div
                                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        name="notifications" checked="checked" />
                                                    <label class="form-check-label">Enabled</label>
                                                </div>
                                                <!--end::Switch-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-sm btn-light btn-active-light-primary me-2"
                                                    data-kt-menu-dismiss="true">Reset</button>
                                                <button type="submit" class="btn btn-sm btn-primary"
                                                    data-kt-menu-dismiss="true">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Menu 1-->
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="pt-5 card-body">
                                <!--begin::Timeline-->
                                <div class="timeline-label">
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="text-gray-800 timeline-label fw-bold fs-6">08:42</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-warning fs-1"></i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Text-->
                                        <div class="fw-mormal timeline-content text-muted ps-3">Outlines keep you honest.
                                            And keep structure</div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="text-gray-800 timeline-label fw-bold fs-6">10:00</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-success fs-1"></i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Content-->
                                        <div class="timeline-content d-flex">
                                            <span class="text-gray-800 fw-bold ps-3">AEOL meeting</span>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="text-gray-800 timeline-label fw-bold fs-6">14:37</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-danger fs-1"></i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Desc-->
                                        <div class="text-gray-800 timeline-content fw-bold ps-3">Make deposit
                                            <a href="#" class="text-primary">USD 700</a>. to ESL
                                        </div>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="text-gray-800 timeline-label fw-bold fs-6">16:50</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-primary fs-1"></i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Text-->
                                        <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly driving
                                            and keep structure keep great</div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="text-gray-800 timeline-label fw-bold fs-6">21:03</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-danger fs-1"></i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Desc-->
                                        <div class="text-gray-800 timeline-content fw-semibold ps-3">New order placed
                                            <a href="#" class="text-primary">#XF-2356</a>.
                                        </div>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="text-gray-800 timeline-label fw-bold fs-6">16:50</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-primary fs-1"></i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Text-->
                                        <div class="timeline-content fw-mormal text-muted ps-3">Indulging in poorly driving
                                            and keep structure keep great</div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="text-gray-800 timeline-label fw-bold fs-6">21:03</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-danger fs-1"></i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Desc-->
                                        <div class="text-gray-800 timeline-content fw-semibold ps-3">New order placed
                                            <a href="#" class="text-primary">#XF-2356</a>.
                                        </div>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="text-gray-800 timeline-label fw-bold fs-6">10:30</div>
                                        <!--end::Label-->
                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-success fs-1"></i>
                                        </div>
                                        <!--end::Badge-->
                                        <!--begin::Text-->
                                        <div class="timeline-content fw-mormal text-muted ps-3">Finance KPI Mobile app
                                            launch preparion meeting</div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Timeline-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end: List Widget 5-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>

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
    <script></script>
@endsection
