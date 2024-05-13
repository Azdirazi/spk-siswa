<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>

        @include('assets.css')
    </head>
    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                @include('includes.sidebar')

                <div class="layout-page">
                    @include('includes.navbar')
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            @yield('content')
                        </div>
                        <!-- / Content -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        @include('assets.js')
        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
        @stack('script')
    </body>
</html>
