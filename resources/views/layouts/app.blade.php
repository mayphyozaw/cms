<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS</title>

    <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('backend/assets/img/apple-icon.png') }}">
    <script src="{{asset('backend/assets/js/theme-script.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <style>
        .user-blocked td {
            background-color: #da8383 !important;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/tabler-icons/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/simplebar/simplebar.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables/css/dataTables.bootstrap5.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Choices CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}" id="app-style">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    

</head>

<body>
    <div class="main-wrapper">
        @include('admin.body.header')
        @include('layouts.sidebar')

        @if (!request()->routeIs('dashboard'))
            @include('admin.body.sidebar')
        @endif

        <div class="page-wrapper">
            <div class="content pb-0">
                <div class="row">
                    @yield('content')
                    @include('admin.body.footer')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend/assets/js/script.js') }}"></script>

    {{-- <script src="{{ asset('backend/assets/js/jquery-3.7.1.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/simplebar/simplebar.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>

    <script src="{{ asset('backend/assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset('backend/assets/plugins/datatables/js/dataTables.bootstrap5.min.js') }}"></script> --}}

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

    <script src="https://cdn.datatables.net/2.3.6/js/dataTables.js"></script>

    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.6/datatables.min.js"
        integrity="sha384-kbj0kfdGeXuGxFs602DcfnL0cwxrpYR1MK4bZpH5ORM44q7KnoAa83jyxZs3QF1d" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




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

    {{-- <script>
        $('.select_2').select2();
    </script> --}}

    @stack('scripts')

</body>

</html>
