<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.png') }}" />
    @livewireStyles
</head>

<body>
    {{ $slot }}
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin_assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin_assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin_assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin_assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin_assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin_assets/js/todolist.js') }}"></script>
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
    </script>
    <!-- endinject -->
    @livewireScripts
</body>

</html>
