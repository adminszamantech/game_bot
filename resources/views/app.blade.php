<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Game Bot</title>
    <link rel="stylesheet" href="{{ asset('/storage/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('/storage/assets/images/favicon.png') }}" />


    @vite(['resources/js/app.css','resources/js/app.js'])
    @routes
</head>
<body>
    @inertia

    <script src="{{ asset('/storage/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('/storage/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/storage/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('/storage/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('/storage/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('/storage/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/storage/assets/js/jquery.cookie.js" type="text/javascript') }}"></script>
    <script src="{{ asset('/storage/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/storage/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/storage/assets/js/misc.js') }}"></script>
    <script src="{{ asset('/storage/assets/js/settings.js') }}"></script>
    <script src="{{ asset('/storage/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('/storage/assets/js/dashboard.js') }}"></script>
</body>
</html>
