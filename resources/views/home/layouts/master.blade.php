<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- Responsive meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- IE Compatibility meta -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Description meta -->
        <meta name="description" content="...">
        <!-- Author meta -->
        <meta name="author" content="Bootstrap Temple">

        <!-- Page Title -->
        <title>Coffeeground</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/home/img/favicon.ico">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{!! asset('assets/home/css/bootstrap.min.css') !!}">
        <!-- Custom font icons -->
        <link rel="stylesheet" href="https://file.myfontastic.com/6AeAYiqp5KBjSiZ2tE8WJW/icons.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Slider -->
        <link rel="stylesheet" href="{!! asset('assets/home/css/slider.min.css') !!}">
        <!-- Lightbox Pop up -->
        <link rel="stylesheet" href="{!! asset('assets/home/css/lightbox.min.css') !!}">
        <!-- Datepicker -->
        <link rel="stylesheet" href="{!! asset('assets/home/css/datepicker.min.css') !!}">
        <!-- Datepicker -->
        <link rel="stylesheet" href="{!! asset('assets/home/css/timepicki.min.css') !!}">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="{!! asset('assets/home/css/owl.carousel.min.css') !!}">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{!! asset('assets/home/css/style.default.css') !!}">
        <!-- Modernizr -->
        <script type="text/javascript" src="{!! asset('assets/home/js/modernizr.custom.79639.min.js') !!}"></script>
    </head>
    <body>

        <div class="page-holder">
            <!-- Navbar -->
            @include('home.layouts.header')

            <!-- Content of the page -->
            @yield('content')

            <!-- Footer -->
            @include('home.layouts.footer')

        </div>

        @include('home.layouts.scripts')
    </body>
</html>
