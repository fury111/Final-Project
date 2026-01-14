<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description', 'Your ecommerce store description')">
    <meta name="author" content="">
    <title>@yield('title', 'Home') - Your Store Name</title>

    <!-- Custom fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for user pages -->
    <link href="{{ asset('css/user-styles.css') }}" rel="stylesheet">

    <!-- Optional: Yield for page-specific CSS -->
    @yield('css')
</head>

<body>

    <!-- Header -->
    @include('user_layouts.user_header')
    <!-- End of Header -->

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>
    <!-- End of Main Content -->

    <!-- Footer -->
    @include('user_layouts.user_footer')
    <!-- End of Footer -->

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="fas fa-arrow-up"></i>
    </a>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/user-scripts.js') }}"></script> <!-- Or sb-admin-2.js -->
    @yield('js')
</body>

</html>