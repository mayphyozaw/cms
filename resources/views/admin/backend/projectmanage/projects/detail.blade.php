@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Project Detail</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Project Detail</li>
                    </ol>
                </nav>
            </div>

        </div>

        <!-- start row -->
        <div class="row">

            <div class="col-xl-3 col-lg-12 theiaStickySidebar">

                <div class="card mb-3 mb-xl-0">
                    <div class="card-body">
                        <div class="settings-sidebar">
                            <h5 class="mb-3 fs-17">Project Details</h5>
                            <div class="list-group list-group-flush settings-sidebar">

                                <a href="{{ route('projectmanage.projects.show',$project->id) }}" class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.show') ? 'active' : '' }}">
                                    <i class="ti ti-settings-cog me-2"></i>
                                    Project Information
                                </a>
                                <a href="{{route('projectmanage.projects.drawings.index', $project->id)}}" class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.drawings.*') ? 'active' : '' }}">
                                    <i class="ti ti-device-laptop me-2"></i>
                                    Drawings
                                </a>

                                <a href="{{route('projectmanage.projects.drawing-measurements.index', $project->id)}}" class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.drawing-measurements.*') ? 'active' : '' }}">
                                    <i class="ti ti-device-laptop me-2"></i>
                                    Drawing Measurements
                                </a>
                                
                                <a href="connected-apps.html" class="d-block p-2 fw-medium">
                                    <i class="ti ti-list-check me-2"></i>
                                    Site Measurements
                                </a>
                                <a href="connected-apps.html" class="d-block p-2 fw-medium">
                                    <i class="ti ti-moneybag me-2"></i>
                                    BOQ
                                </a>
                                <a href="connected-apps.html" class="d-block p-2 fw-medium">
                                    <i class="ti ti-list-check me-2"></i>
                                    Proposal
                                </a>
                                <a href="connected-apps.html" class="d-block p-2 fw-medium">
                                    <i class="ti ti-list-check me-2"></i>
                                    Variation Orders
                                </a>
                                <a href="connected-apps.html" class="d-block p-2 fw-medium">
                                    <i class="ti ti-list-check me-2"></i>
                                    Billing
                                </a>
                                <a href="connected-apps.html" class="d-block p-2 fw-medium">
                                    <i class="ti ti-list-check me-2"></i>
                                    Report
                                </a>
                            </div>
                        </div>
                    </div> <!-- end card body -->
                </div> <!-- end card -->

            </div> <!-- end col -->

            <div class="col-xl-9 col-lg-12">

                <div class="card mb-0">
                    <div class="card-body pb-0">
                        <div class="border-bottom mb-3 pb-3">
                            <h5 class="mb-0 fs-17">Project Information</h5>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="background-color: #9dd2e7">Project Code</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Customer Name</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Project Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            
                                            <td class="text-center">
                                                P- {{ $project->client->project_code }}
                                            </td>
                                            <td class="text-center">
                                                {{ $project->client->name }}
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-soft-{{ $project->projectStatusBadge() }}">
                                                    {{ $project->status }}
                                                </span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div> <!-- end card body -->
                </div> <!-- end card -->

            </div> <!-- end col -->

        </div>
        <!-- end row -->

    </div>
@endsection
