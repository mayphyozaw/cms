<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS</title>


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon.png') }}">

    <!-- Apple Icon -->
    <link rel="apple-touch-icon" href="{{ asset('backend/assets/img/apple-icon.png') }}">

    <!-- Theme Config Js -->
    <script src="{{asset('backend/assets/js/theme-script.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/tabler-icons/tabler-icons.min.css') }}">

    <!-- Simplebar CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/simplebar/simplebar.min.css') }}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables/css/dataTables.bootstrap5.min.css') }}">

    <!-- Daterangepicker CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}" id="app-style">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.12.0/toastify.min.css"> --}}

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> --}}


</head>

<body>

    <!-- Begin Wrapper -->
    <div class="main-wrapper">


        @include('admin.body.header')

        @include('admin.body.sidebar')

        <div class="page-wrapper">
            @yield('content')
            @include('admin.body.footer')
        </div>



    </div>



    <!-- jQuery -->
    <script src="{{asset('backend/assets/js/jquery-3.7.1.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>



    <script data-cfasync="false" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>

    <!-- Simplebar JS -->
    <script src="{{asset('backend/assets/plugins/simplebar/simplebar.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>

    <!-- Datatable JS -->

    <script src="https://cdn.datatables.net/2.3.6/js/dataTables.js"></script>

    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.3.6/datatables.min.js"
        integrity="sha384-kbj0kfdGeXuGxFs602DcfnL0cwxrpYR1MK4bZpH5ORM44q7KnoAa83jyxZs3QF1d" crossorigin="anonymous">
    </script>

    {{-- <script src="{{asset('backend/assets/plugins/datatables/js/jquery.dataTables.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script> --}}
    <script src="{{asset('backend/assets/plugins/datatables/js/dataTables.bootstrap5.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>

    <!-- Daterangepicker JS -->
    <script src="{{asset('backend/assets/js/moment.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/daterangepicker/daterangepicker.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>

    <!-- Apexchart JS -->
    <script src="{{asset('backend/assets/plugins/apexchart/apexcharts.min.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/apexchart/chart-data.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>

    <!-- Custom Json Js -->
    <script src="{{asset('backend/assets/js/jsonscript.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script>

    <!-- Main JS -->
    {{-- <script src="{{asset('backend/assets/js/script.js')}}" type="2feec2ecac7da57f288991d1-text/javascript"></script> --}}

    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


 


    <script>
        // @if (session()->has('message'))
        //     toastr.options = {
        //         closeButton: true,
        //         progressBar: true,
        //         positionClass: "toast-top-right",
        //         timeOut: 3000
        //     };

        //     switch ("{{ session('alert-type', 'success') }}") {
        //         case 'info':
        //             toastr.info("{{ session('message') }}");
        //             break;
        //         case 'success':
        //             toastr.success("{{ session('message') }}");
        //             break;
        //         case 'warning':
        //             toastr.warning("{{ session('message') }}");
        //             break;
        //         case 'error':
        //             toastr.error("{{ session('message') }}");
        //             break;
        //     }
        // @endif


        toastr.success("✅ Toastr is working!");
    </script>

    {{-- <script>
        Toastify({
            text: "Hello! Toastify is working 🎉",
            duration: 3000,
            gravity: "top", // top or bottom
            position: "right", // left, center, right
            backgroundColor: "#28a745",
        }).showToast();
    </script> --}}

    <script>
        $('.select_2').select2();
    </script>

    @stack('scripts')
</body>


</html>
