<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')CMS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('backend/assets/img/apple-icon.png') }}">
    <script src="{{asset('backend/assets/js/theme-script.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <style>
        #toast-container>.toast-success {
            background-color: #51A351 !important;
        }

        #toast-container>.toast-error {
            background-color: #BD362F !important;
        }

        #toast-container>.toast-warning {
            background-color: #F89406 !important;
        }

        #toast-container>.toast-info {
            background-color: #2F96B4 !important;
        }
    </style>


    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/tabler-icons/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/simplebar/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

    </div> --}}
    <div class="min-h-screen bg-gray-100">
        <div class="main-wrapper">
            <div class="page-wrapper">
                <div class="content pb-0">
                     @include('layouts.header')
                   
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
                
                 {{-- @include('layouts.footer') --}}
            </div>

        </div>
    </div>



    <!-- jQuery -->
    <script src="{{ asset('backend/assets/js/jquery-3.7.1.min.js') }}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/simplebar/simplebar.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{ asset('backend/assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{asset('backend/assets/js/moment.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/apexchart/apexcharts.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/apexchart/chart-data.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/js/jsonscript.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/js/script.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{ asset('backend/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="2feec2ecac7da57f288991d1-|49" defer></script>

    <!-- Choices Js -->
    <script src="{{asset('backend/assets/plugins/choices.js/public/assets/scripts/choices.min.js')}}" type="a1dcc44babf6ba6f47b105cc-text/javascript"></script>

    <!-- Select2 Js -->
    {{-- <script src="{{asset('backend/assets/plugins/select2/js/select2.min.js')}}" type="a1dcc44babf6ba6f47b105cc-text/javascript"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>


    <script>
        @if (session()->has('message'))
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right",
                timeOut: 3000
            };

            switch ("{{ session('alert-type', 'success') }}") {
                case 'info':
                    toastr.info("{{ session('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ session('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ session('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ session('message') }}");
                    break;
            }
        @endif
    </script>

    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    <script>
        $('.select_2').select2();
    </script>

    @stack('scripts')

</body>

</html>
