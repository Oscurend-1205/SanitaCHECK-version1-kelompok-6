<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SanitaCHECK Admin Panel">
    <title>@yield('title', 'Admin Panel') - SanitaCHECK</title>
    
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/admin/dist/assets/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/admin/dist/assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/admin/dist/assets/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/admin/dist/assets/favicon/favicon-16x16.png') }}">
    
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css">
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/vendors/simplebar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.2/dist/css/coreui.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/coreui/coreui-free-bootstrap-admin-template@v4.2.2/dist/js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/coreui/coreui-free-bootstrap-admin-template@v4.2.2/dist/js/color-modes.js"></script>
    
    @stack('styles')
    <style>
      @media (min-width: 992px) {
        .wrapper {
          padding-left: 256px !important;
        }
      }
    </style>
  </head>
  <body>
    <!-- Sidebar -->
    @include('layouts.admin.sidebar')
    
    <div class="wrapper d-flex flex-column min-vh-100">
      <!-- Header -->
      @include('layouts.admin.header')
      
      <!-- Main Content -->
      <div class="body flex-grow-1">
        <div class="container-lg px-4">
            @yield('content')
        </div>
      </div>
      
      <!-- Footer -->
      @include('layouts.admin.footer')
    </div>
    
    <!-- CoreUI and necessary plugins-->
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.2/dist/js/coreui.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>
    <script>
      const header = document.querySelector("header.header");
      document.addEventListener("scroll", () => {
        if (header) {
          header.classList.toggle("shadow-sm", document.documentElement.scrollTop > 0);
        }
      });
    </script>
    @stack('scripts')
  </body>
</html>
