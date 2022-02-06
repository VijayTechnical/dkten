<!DOCTYPE html>
<html lang="en">

<head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dk10_master_assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dk10_master_assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('dk10_master_assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('dk10_master_assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dk10_master_assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dk10_master_assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('dk10_master_assets/css/style.css') }}">
    <!-- End layout styles -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ckeeditor -->
    <script src="{{ asset('dk10_master_assets/ckeditor/ckeditor.js') }}"></script>

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dk10_master_assets/vendors/select2/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('dk10_master_assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Favicon Image -->
    <link rel="icon" type="image/png" href="{{ asset('favicon/logo.png') }}" />

    @livewire('admin.components.admin-head-component')



    @stack('styles')
    @livewireStyles
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                @livewire('admin.components.admin-header-logo-component')
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                @php
                                $admin_user = Auth::guard('admin')->user();
                                @endphp
                                <img class="img-xs rounded-circle "
                                    src="{{ '/storage/admin' }}/{{ $admin_user->image }}" alt="{{ $admin_user->name }}">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">{{ $admin_user->name }}</h5>
                                <span>{{ $admin_user->roles->pluck('name')[0] ?? '' }}</span>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
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
                        </div>
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
                <li class="nav-item menu-items">
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
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category') }}"> Category
                                </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.brand') }}">
                                    Brand </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.type') }}">
                                    Type </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.attribute') }}"> Attribute
                                </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.product') }}"> Product </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.stock') }}"> Product Stock
                                </a>
                            </li>
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
                    class="nav-item menu-items {{ Route::is('admin.sale') || Route::is('admin.sale.view') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.sale') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Sales</span>
                    </a>
                </li>
                <li
                    class="nav-item menu-items {{ Route::is('admin.ticket') || Route::is('admin.ticket.show') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.ticket') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Tickets</span>
                    </a>
                </li>
                <li class="nav-item menu-items {{ Route::is('admin.report') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.report') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Stock Reports</span>
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
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.vendor') }}"> Vendor List
                                </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.vendor.commision') }}">
                                    Vendor Commision
                                </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.vendor.slider') }}"> Vendor
                                    Slider List
                                </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.vendor.pay_vendor') }}"> Vendor Payment
                                </a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items {{ Route::is('admin.customer') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.customer') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Customers</span>
                    </a>
                </li>
                <li
                    class="nav-item menu-items  {{ Route::is('admin.bcategory') || Route::is('admin.bcategory.add') || Route::is('admin.bcategory.edit') || Route::is('admin.blog') || Route::is('admin.blog.add') || Route::is('admin.blog.edit') ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
                        <span class="menu-icon">
                            <i class="mdi mdi-security"></i>
                        </span>
                        <span class="menu-title">Blog</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="blog">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.bcategory') }}"> Blog
                                    Category </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.blog') }}"> Blog</a></li>
                        </ul>
                    </div>
                </li>
                <li
                    class="nav-item menu-items {{ Route::is('admin.vcategory') || Route::is('admin.vcategory.add') || Route::is('admin.vcategory.edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.vcategory') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Vendor Category</span>
                    </a>
                </li>
                <li
                    class="nav-item menu-items {{ Route::is('admin.vtype') || Route::is('admin.vtype.add') || Route::is('admin.vtype.edit') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.vtype') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-laptop"></i>
                        </span>
                        <span class="menu-title">Vendor Type</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#front" aria-expanded="false"
                        aria-controls="front">
                        <span class="menu-icon">
                            <i class="mdi mdi-security"></i>
                        </span>
                        <span class="menu-title">Frontend Setting</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="front">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.gsetting') }}"> General
                                    Setting </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.ssetting') }}"> Social
                                    Setting </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.logo') }}"> Logo </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.payment') }}"> Payment
                                    Method</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.legality') }}">Legality</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.faq') }}">Faq's</a></li>
                        </ul>
                    </div>
                </li>
                @role('master')
                <li
                    class="nav-item menu-items
                    {{ Route::is('admin.staff') || Route::is('admin.staff.add') || Route::is('admin.staff.edit') || Route::is('admin.role') || Route::is('admin.role.add') || Route::is('admin.role.edit') || Route::is('admin.permission') || Route::is('admin.permission.add') || Route::is('admin.permission.edit') ? 'active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#staff" aria-expanded="false"
                        aria-controls="staff">
                        <span class="menu-icon">
                            <i class="mdi mdi-security"></i>
                        </span>
                        <span class="menu-title">Staff Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="staff">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.staff') }}">Staff</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.role') }}">Role</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.permission') }}">Permission</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endrole
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @livewire('admin.components.admin-header-component')
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
    <script src="{{ asset('dk10_master_assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('dk10_master_assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('dk10_master_assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('dk10_master_assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('dk10_master_assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('dk10_master_assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('dk10_master_assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('dk10_master_assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('dk10_master_assets/js/misc.js') }}"></script>
    <script src="{{ asset('dk10_master_assets/js/settings.js') }}"></script>
    <script src="{{ asset('dk10_master_assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('dk10_master_assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
        integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tiny.cloud/1/kntejrprjs5hetwm4fh98wy0isd70b1bw75id5v6ncrxugab/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });
    </script>
    <script type="text/javascript">
        var options = {
            "backdrop": "static",
            "show": true
        }
        window.addEventListener('showVendor', function(event) {
            $('#vendorView').modal(options);
        });
    </script>
    <script type="text/javascript">
        var options = {
            "backdrop": "static",
            "show": true
        }
        window.addEventListener('showCustomer', function(event) {
            $('#customerView').modal(options);
        });
    </script>

    {{-- <script src="{{ asset('js/app.js') }}"></script>
    <script>
        Echo.channel('events')
            .listen('RealTimeMessage', (e) => console.log('RealTimeMessage: ' + e.message));
    </script> --}}
    @stack('scripts')

    @livewireScripts
</body>

</html>