<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DK10 | Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="icon" type="image/png" href="{{ asset('user_assets/images/idesign/logo.jpg') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Datatables -->
    <link href="{{ asset('admin_assets/vendors/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendors/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/select2/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('admin_assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('styles')


    @livewireStyles
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="{{ route('admin.dashboard') }}"><img
                        src="{{ asset('user_assets/images/idesign/logo.jpg') }}" alt="logo"
                        class="px-10 py-10"></a>
                <a class="sidebar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}"><img
                        src="{{ asset('user_assets/images/idesign/logo.jpg') }}" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle "
                                    src="{{ '/storage/user' }}/{{ Auth::user()->profile_photo_path }}"
                                    alt="{{ Auth::user()->name }}">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                                <span>Admin</span>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical"></i></a>
                        {{-- <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">
                            <a href="{{ route('admin.profile') }}" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-settings text-primary"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Profile</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('admin.profile') }}" class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-onepassword  text-info"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                                </div>
                            </a>
                        </div> --}}
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false"
                        aria-controls="product">
                        <span class="menu-icon">
                            <i class="mdi mdi-security"></i>
                        </span>
                        <span class="menu-title">Product</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="product">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ route('admin.category') }}"> Category </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.type') }}">
                                    Type </a></li>
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ route('admin.attribute') }}"> Attribute </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.brand') }}">
                                    Brand </a></li>
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ route('admin.product') }}"> Product </a></li>
                        </ul>
                    </div>
                </li>
                <li
                    class="nav-item menu-items {{ Route::is('admin.coupon') || Route::is('admin.coupon.add') || Route::is('admin.coupon.edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.coupon') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Coupon</span>
                    </a>
                </li>
                <li
                    class="nav-item menu-items {{ Route::is('admin.customer') || Route::is('admin.customer.add') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.customer') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Customer</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#vendor" aria-expanded="false"
                        aria-controls="vendor">
                        <span class="menu-icon">
                            <i class="mdi mdi-security"></i>
                        </span>
                        <span class="menu-title">Vendor</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="vendor">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ route('admin.vendor') }}"> Vendor </a></li>
                        </ul>
                    </div>
                </li> --}}
                {{-- <li
                    class="nav-item menu-items {{ Route::is('admin.slider') || Route::is('admin.slider.add') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.slider') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Sliders</span>
                    </a>
                </li>
                <li class="nav-item menu-items {{ Route::is('admin.about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.about') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">About Us</span>
                    </a>
                </li>
                <li
                    class="nav-item menu-items {{ Route::is('admin.category') || Route::is('admin.category.add') || Route::is('admin.category.edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.category') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-playlist-play"></i>
                        </span>
                        <span class="menu-title">Category</span>
                    </a>
                </li>
                <li
                    class="nav-item menu-items {{ Route::is('admin.tag') || Route::is('admin.tag.add') || Route::is('admin.tag.edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.tag') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-contacts"></i>
                        </span>
                        <span class="menu-title">Tag</span>
                    </a>
                </li>
                <li
                    class="nav-item menu-items {{ Route::is('admin.attribute') || Route::is('admin.attribute.add') || Route::is('admin.attribute.edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.attribute') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-contacts"></i>
                        </span>
                        <span class="menu-title">Product Attribute</span>
                    </a>
                </li>
                <li
                    class="nav-item menu-items {{ Route::is('admin.product') || Route::is('admin.product.add') || Route::is('admin.product.edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.product') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Product</span>
                    </a>
                </li>
                <li
                    class="nav-item menu-items {{ Route::is('admin.orders') || Route::is('admin.orders.show') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.orders') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-chart-bar"></i>
                        </span>
                        <span class="menu-title">Product Orders</span>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            {{-- @livewire('admin.includes.admin-header-component') --}}
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    {{ $slot }}
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">copyright &copy; All
                            Right Reserved.Idesign</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Developed by <a
                                href="nextaussietech.com" target="_blank">NAT</a></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin_assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin_assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin_assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin_assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin_assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin_assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin_assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin_assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin_assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
    <!-- datatables plugins -->
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    {{-- sweet alert --}}
    <script src="{{ asset('admin_assets/js/sweetalert.js') }}"></script>
    <script>
        window.addEventListener('swal:model', event => {
            swal({
                icon: event.detail.statuscode,
                text: event.detail.text,
                title: event.detail.title,
            });
        });
        window.addEventListener('swal:confirm', event => {
            swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.statuscode,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.livewire.emit('delete', event.detail.id);
                    }
                });
        });
        window.addEventListener('swal:confirmstatus', event => {
            swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.statuscode,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willUpdate) => {
                    if (willUpdate) {
                        window.livewire.emit('statusupdate', event.detail.id, event.detail.status);
                    }
                });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
        integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tiny.cloud/1/kntejrprjs5hetwm4fh98wy0isd70b1bw75id5v6ncrxugab/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    {{-- <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel('events')
            .listen('RealTimeMessage', (e) => console.log('RealTimeMessage: ' + e.message));
    </script> --}}

    @stack('scripts')

    @livewireScripts
</body>

</html>
