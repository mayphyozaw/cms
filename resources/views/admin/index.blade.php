@extends('admin.admin_main')
@section('dashboard-page-active', 'active')
@section('admin')
    <div class="content pb-0">
        <!-- start row -->
        <div class="row">

            <div class="col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                        <h6 class="mb-0">Recently Created Users</h6>
                        <div class="dropdown">
                            <a class="dropdown-toggle btn btn-outline-light shadow" data-bs-toggle="dropdown"
                                href="javascript:void(0);">
                                Last 30 days
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    Last 15 days
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    Last 30 days
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                            <h6 class="mb-0">Deals By Stage</h6>
                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                <div class="dropdown me-2">
                                    <a class="dropdown-toggle btn btn-outline-light shadow" data-bs-toggle="dropdown"
                                        href="javascript:void(0);">
                                        Sales Pipeline
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Marketing Pipeline
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Sales Pipeline
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Email
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Chats
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Operational
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-toggle btn btn-outline-light shadow" data-bs-toggle="dropdown"
                                        href="javascript:void(0);">
                                        Last 30 Days
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Last 30 Days
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Last 15 Days
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Last 7 Days
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div id="deals-chart"></div>
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

        </div>
        <!-- end row -->

        <!-- start row -->
        <div class="row">

            <div class="col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                            <h6 class="mb-0">Lost Deals Stage</h6>
                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                <div class="dropdown me-2">
                                    <a class="dropdown-toggle btn btn-outline-light shadow" data-bs-toggle="dropdown"
                                        href="javascript:void(0);">
                                        Marketing Pipeline
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Marketing Pipeline
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Sales Pipeline
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Email
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Chats
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Operational
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-toggle btn btn-outline-light shadow" data-bs-toggle="dropdown"
                                        href="javascript:void(0);">
                                        Last 30 Days
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Last 30 Days
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Last 6 months
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Last 12 months
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div id="last-chart"></div>
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                            <h6 class="mb-0">Won Deals Stage</h6>
                            <div class="d-flex align-items-center flex-wrap row-gap-3">
                                <div class="dropdown me-2">
                                    <a class="dropdown-toggle btn btn-outline-light shadow" data-bs-toggle="dropdown"
                                        href="javascript:void(0);">
                                        Marketing Pipeline
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Marketing Pipeline
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Sales Pipeline
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Email
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Chats
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Operational
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-toggle btn btn-outline-light shadow" data-bs-toggle="dropdown"
                                        href="javascript:void(0);">
                                        Last 30 Days
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Last 30 Days
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Last 6 months
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            Last 12 months
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <div id="won-chart"></div>
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

        </div>
        <!-- end row -->



    </div>
@endsection
