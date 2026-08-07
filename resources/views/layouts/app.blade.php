<!DOCTYPE html>
<html lang="en">

<head>

    {{-- <meta charset="utf-8"> --}}

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="{{ asset('backend/assets/img/apple-icon.png') }}">
    <script src="{{ asset('backend/assets/js/theme-script.js') }}"></script>
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
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <!-- Choices CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}" id="app-style">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">

    {{-- Date Range Picker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <style>
        .note-editor .note-editable ul {
            list-style-type: disc !important;
            list-style-position: outside !important;
            padding-left: 25px !important;
        }

        .note-editor .note-editable ol {
            list-style-type: decimal !important;
            padding-left: 25px !important;
        }

        .note-editor .note-editable li {
            display: list-item !important;
        }

        .select2-container {
            width: 100% !important;
        }

        .select2-selection--single {
            height: 38px !important;
        }

        .select2-selection__rendered {
            line-height: 38px !important;
        }

        .select2-selection__arrow {
            height: 38px !important;
        }

        .dashboard-page .page-wrapper,
        .dashboard-page .navbar-header {
            margin-left: 0 !important;
        }
    </style>
</head>

<body class="{{ request()->routeIs('dashboard') ? 'dashboard-page' : '' }}">
    <div class="main-wrapper">


        @include('admin.body.header')


        @if (!request()->routeIs('dashboard'))
            @include('admin.body.sidebar')
        @endif


        <div class="page-wrapper">

            @yield('content')

            @include('admin.body.footer')
        </div>

    </div>

    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('backend/assets/plugins/simplebar/simplebar.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/moment.min.js') }}"></script>

    <script src="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('backend/assets/js/script.js') }}"></script>

    {{-- Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    {{-- Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- Choices --}}
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    {{-- DataTable --}}
    <script src="{{ asset('backend/assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- Toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Flatpickr --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    {{-- Apex Chart --}}
    <script src="{{ asset('backend/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('backend/assets/js/jsonscript.js') }}"></script>

    {{-- DateRange Picker --}}
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('[data-choices]');

            elements.forEach(function(el) {
                new Choices(el, {
                    searchEnabled: true,
                    itemSelectText: '',
                });
            });
        });

        flatpickr("#datetime", {
            enableTime: true,
            enableSeconds: true,
            dateFormat: "Y-m-d H:i:S",
            time_24hr: true
        });
    </script>

    <script>
        $(document).ready(function() {

            $('.select2').select2({
                width: '100%'
            });

        });
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

    @stack('scripts')

</body>

</html>
