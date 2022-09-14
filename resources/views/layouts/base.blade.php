<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link href="https://dkten.com/template/front/plugins/bootstrap-select/css/bootstrap-select.min.css"
        rel="stylesheet">
    <link href="https://dkten.com/template/front/plugins/animate/animate.min.css" rel="stylesheet">
    <link href="https://dkten.com/template/front/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="https://dkten.com/template/front/modal/css/sm.css" rel="stylesheet">
    <link href="https://dkten.com/template/front/rateit/rateit.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dk10_assets/theme.css') }}">
    <link href="https://dkten.com/template/front/css/theme-red-1.css" rel="stylesheet" id="theme-config-link">
    <link href="https://dkten.com/template/front/plugins/smedia/custom-1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600,700,800,900" rel="stylesheet"
        type="text/css">
    <script src="https://dkten.com/template/front/plugins/jquery/jquery-1.11.1.min.js"></script>
    <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css"
        rel="stylesheet">
    <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css"
        rel="stylesheet">
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
    </script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Favicon Image -->
    <link rel="icon" type="image/png" href="{{ asset('favicon/logo.png') }}" />

    @livewire('components.head-component')

    @stack('styles')
    @livewireStyles
</head>

<body>
    @livewire('components.topbar-component')

    @livewire('components.midbar-component')
    <!-- Navigation -->

    @livewire('components.header-component')

    <!-- /Navigation -->


    {{ $slot }}


    <!-- FOOTER -->

    <!-- Messenger Chat Plugin Code -->

    <style>
        body {
            /* THIS PART IS EXCLUSIVLY MENTIONED IN FOOTER */
            font-size: 12px;
            background: #fff;
        }

        .navigation {
            /* THIS PART IS EXCLUSIVLY MENTIONED IN FOOTER */
            position: relative;
            text-align: left;
            line-height: 0;
        }

        .footer1-widgets {
            background: #f5f5f5;
            color: #666;
        }

        .footer1-widgets .col-md-3 {
            height: 285px;

        }

        .footer1-meta {
            background-color: #003893;
        }

        .app-footer img {
            width: 120px;
        }

        .qr-code img {
            width: 135px;
        }

        .row.foot-bar {
            background: #003893;
            color: #eee;
            padding: 13px 0px 0px;
        }

        h3.footer-title {
            text-transform: uppercase;
            font-size: 17px;
            margin: 20px 0px;
            text-decoration: underline;
            line-height: 17px;
        }

        .footer-widget li {
            line-height: 25px;
            font-size: 14px;
        }

        .footer1-widgets .container {
            padding: 20px 15px 0px 15px;
        }

        .footer1-widgets {
            padding: 0px 0 0px;
        }

        .footer1-widgets .fa {
            padding: 3px;
            border-radius: 2px;
            font-size: 17px;

        }

        .footer1-widgets .fa-facebook {
            font-size: 20px;
            color: white;
            background: #3B5998;

        }

        .footer1-widgets .fa-instagram {
            font-size: 20px;
            color: white;
            background: #2C6A93;
        }

        .footer1-widgets .fa-youtube {
            font-size: 20px;
            color: white;
            background: #C31A1E;
        }

        .footer1-widgets .fa-map-marker-alt,
        .footer1-widgets .fa-envelope {
            color: red;

        }

        .footer-widget h3.footer-title {

            color: #111111;
        }

        .footer-widget .footer-info-list ul li a {
            color: grey;

        }

        .footer-widget .footer-info-list ul li a:hover {
            color: rgb(25, 25, 155);
        }
    </style>

    @livewire('components.cart-component')

    @livewire('components.footer-component')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- JS START -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://dkten.com/template/front/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://dkten.com/template/front/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>

    <script>
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });
    </script>
    @stack('scripts')
    @livewireScripts
    <!-- JS END -->
</body>

</html>