@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    BOQ
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            BOQ
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <div class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-light px-2 shadow"
                        data-bs-toggle="dropdown">
                        <i class="ti ti-package-export me-2"></i>
                        Export
                    </a>
                    <div class="dropdown-menu  dropdown-menu-end">
                        <ul>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="ti ti-file-type-pdf me-1"></i>
                                    Export as PDF
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="ti ti-file-type-xls me-1"></i>
                                    Export as Excel
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                    <i class="ti ti-refresh"></i>
                </a>
                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="Collapse" data-bs-original-title="Collapse" id="collapse-header">
                    <i class="ti ti-transition-top"></i>
                </a>
            </div>
        </div>


        <div class="content">

            <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
                <div>
                    <h4 class="mb-1">BOQ Information</h4>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">
                                BOQ
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="gap-2 d-flex align-items-center flex-wrap">

                    <a href="{{ route('projectmanage.projects.index') }}" class="btn btn-outline-light shadow">
                        <span style="color:black">{{ $project->client->project_code }} @
                            {{ $project->client->name }} - ({{ $project->client->length }} * {{ $project->client->width }})
                            -
                            {{ $project->client->building_area }} sqft
                        </span>
                    </a>

                </div>
            </div>

            <div class="row">

                {{-- Sidebar --}}
                <div class="col-xl-3 col-lg-12 theiaStickySidebar">

                    <div class="card mb-3 mb-xl-0">
                        <div class="card-body">

                            <div class="settings-sidebar">

                                <h5 class="mb-3 fs-17">Project Details</h5>

                                <div class="list-group list-group-flush settings-sidebar">

                                    <a href="{{ route('projectmanage.projects.show', $project->id) }}"
                                        class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.show') ? 'active' : '' }}">
                                        <i class="ti ti-settings-cog me-2"></i>
                                        Project Information
                                    </a>

                                    <a href="{{ route('projectmanage.projects.drawings.index', $project->id) }}"
                                        class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.drawings.*') ? 'active' : '' }}">
                                        <i class="ti ti-device-laptop me-2"></i>
                                        Drawings
                                    </a>

                                    <a href="{{ route('projectmanage.projects.drawing-measurements.index', $project->id) }}"
                                        class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.drawing-measurements.*') ? 'active' : '' }}">
                                        <i class="ti ti-list-check me-2"></i>
                                        Drawing Measurements
                                    </a>

                                    <a href="{{ route('projectmanage.projects.mixRatio.index', $project->id) }}"
                                        class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.mixRatio.*') ? 'active' : '' }}">
                                        <i class="ti ti-moneybag me-2"></i>
                                        Mix Ratio Header
                                    </a>

                                    <a href="{{ route('projectmanage.projects.material-mappings.index', $project->id) }}"
                                        class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.material-mappings.*') ? 'active' : '' }}">
                                        <i class="ti ti-moneybag me-2"></i>
                                        Material Mapping
                                    </a>


                                    <a href="{{ route('projectmanage.projects.material-requirements.index', $project->id) }}"
                                        class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.material-requirements.*') ? 'active' : '' }}">
                                        <i class="ti ti-moneybag me-2"></i>
                                        Material Requirements
                                    </a>

                                    <a href="{{ route('projectmanage.projects.site-measurements.index', $project->id) }}"
                                        class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.site-measurements.*') ? 'active' : '' }}">
                                        <i class="ti ti-list-check me-2"></i>
                                        Site Measurements
                                    </a>

                                    <a href="{{ route('projectmanage.projects.boq.index', $project->id) }}"
                                        class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.boq.index') ? 'active' : '' }}">
                                        <i class="ti ti-moneybag me-2"></i>
                                        BOQ
                                    </a>

                                    <a href="#" class="d-block p-2 fw-medium">
                                        <i class="ti ti-list-check me-2"></i>
                                        Proposal
                                    </a>

                                    <a href="#" class="d-block p-2 fw-medium">
                                        <i class="ti ti-list-check me-2"></i>
                                        Variation Orders
                                    </a>

                                    <a href="#" class="d-block p-2 fw-medium">
                                        <i class="ti ti-list-check me-2"></i>
                                        Billing
                                    </a>

                                    <a href="#" class="d-block p-2 fw-medium">
                                        <i class="ti ti-list-check me-2"></i>
                                        Report
                                    </a>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                {{-- Main Content --}}
                <div class="col-xl-9 col-lg-12">

                    {{-- Tabs --}}
                    <div class="card border-0">

                        <div class="card-body pb-0 pt-0 px-2">

                            <ul class="nav nav-tabs nav-bordered nav-bordered-primary">

                                <li class="nav-item me-3">
                                    <a href="{{ route('projectmanage.projects.boq.index', $project->id) }}"
                                        class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.boq.index') ? 'active' : '' }}">
                                        <i class="ti ti-settings-cog me-2"></i>
                                        BOQ
                                    </a>
                                </li>


                            </ul>

                        </div>
                    </div>

                    {{-- Table --}}




                    <div class="row">
                        <div class="card border-0 rounded-0">
                            <div class="card-header d-flex align-items-center justify-content-between gap-2 flex-wrap">
                                <div class="input-icon input-icon-start position-relative">
                                    <span class="input-icon-addon text-dark"><i class="ti ti-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <h5 class="d-flex align-items-center mb-0">
                                    BOQ
                                    <span class="badge bg-soft-danger ms-2 text-dark fs-12">
                                        {{-- {{ $proposalAllData->count() }} --}}
                                    </span>
                                </h5>
                                <a href="{{ route('projectmanage.projects.boq.create', $project->id) }}"
                                    class="btn btn-md btn-primary d-flex align-items-center">
                                    <i class="ti ti-circle-plus me-2"></i>
                                    Add New BOQ
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);"
                                            class="dropdown-toggle btn btn-outline-light px-2 shadow"
                                            data-bs-toggle="dropdown">
                                            All BOQs
                                        </a>
                                        <div class="dropdown-menu">
                                            <ul style="list-style:none !important;">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        All Proposals
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        Requested
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        Accepted
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        Declined
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        Draft
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        Deleted
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);"
                                            class="dropdown-toggle btn btn-outline-light px-2 shadow"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-sort-ascending-2 me-2"></i>
                                            Sort By
                                        </a>
                                        <div class="dropdown-menu">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        Newest
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        Oldest
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="reportrange" class="reportrange-picker d-flex align-items-center shadow">
                                        <i class="ti ti-calendar-due text-dark fs-14 me-1"></i>
                                        <span class="reportrange-picker-field">
                                            9 Jun 25 - 9 Jun 25
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="btn bg-soft-indigo px-2 border-0"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                            <i class="ti ti-columns-3 me-2"></i>
                                            Manage Columns
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-md p-3">
                                            <ul>
                                                <li class="gap-1 d-flex align-items-center mb-2">
                                                    <i class="ti ti-columns me-1"></i>
                                                    <div class="form-check form-switch w-100 ps-0">
                                                        <label
                                                            class="form-check-label d-flex align-items-center gap-2 w-100">
                                                            <span>Subject</span>
                                                            <input class="form-check-input switchCheckDefault ms-auto"
                                                                type="checkbox" role="switch" checked>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="gap-1 d-flex align-items-center mb-2">
                                                    <i class="ti ti-columns me-1"></i>
                                                    <div class="form-check form-switch w-100 ps-0">
                                                        <label
                                                            class="form-check-label d-flex align-items-center gap-2 w-100">
                                                            <span>Send To</span>
                                                            <input class="form-check-input switchCheckDefault ms-auto"
                                                                type="checkbox" role="switch" checked>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="gap-1 d-flex align-items-center mb-2">
                                                    <i class="ti ti-columns me-1"></i>
                                                    <div class="form-check form-switch w-100 ps-0">
                                                        <label
                                                            class="form-check-label d-flex align-items-center gap-2 w-100">
                                                            <span>Total Value</span>
                                                            <input class="form-check-input switchCheckDefault ms-auto"
                                                                type="checkbox" role="switch">
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="gap-1 d-flex align-items-center mb-2">
                                                    <i class="ti ti-columns me-1"></i>
                                                    <div class="form-check form-switch w-100 ps-0">

                                                        <label
                                                            class="form-check-label d-flex align-items-center gap-2 w-100">
                                                            <span>Date</span>
                                                            <input class="form-check-input switchCheckDefault ms-auto"
                                                                type="checkbox" role="switch" checked>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="gap-1 d-flex align-items-center mb-2">
                                                    <i class="ti ti-columns me-1"></i>
                                                    <div class="form-check form-switch w-100 ps-0">

                                                        <label
                                                            class="form-check-label d-flex align-items-center gap-2 w-100">
                                                            <span>Open till</span>
                                                            <input class="form-check-input switchCheckDefault ms-auto"
                                                                type="checkbox" role="switch" checked>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="gap-1 d-flex align-items-center mb-2">
                                                    <i class="ti ti-columns me-1"></i>
                                                    <div class="form-check form-switch w-100 ps-0">

                                                        <label
                                                            class="form-check-label d-flex align-items-center gap-2 w-100">
                                                            <span>Type</span>
                                                            <input class="form-check-input switchCheckDefault ms-auto"
                                                                type="checkbox" role="switch" checked>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="gap-1 d-flex align-items-center mb-2">
                                                    <i class="ti ti-columns me-1"></i>
                                                    <div class="form-check form-switch w-100 ps-0">

                                                        <label
                                                            class="form-check-label d-flex align-items-center gap-2 w-100">
                                                            <span>Project</span>
                                                            <input class="form-check-input switchCheckDefault ms-auto"
                                                                type="checkbox" role="switch" checked>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="gap-1 d-flex align-items-center mb-2">
                                                    <i class="ti ti-columns me-1"></i>
                                                    <div class="form-check form-switch w-100 ps-0">

                                                        <label
                                                            class="form-check-label d-flex align-items-center gap-2 w-100">
                                                            <span>Status</span>
                                                            <input class="form-check-input switchCheckDefault ms-auto"
                                                                type="checkbox" role="switch" checked>
                                                        </label>
                                                    </div>
                                                </li>
                                                <li class="gap-1 d-flex align-items-center mb-0">
                                                    <i class="ti ti-columns me-1"></i>
                                                    <div class="form-check form-switch w-100 ps-0">
                                                        <label
                                                            class="form-check-label d-flex align-items-center gap-2 w-100">
                                                            <span>Action</span>
                                                            <input class="form-check-input switchCheckDefault ms-auto"
                                                                type="checkbox" role="switch" checked>
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive table-nowrap custom-table">
                                    <table id="boq-table" class="table">
                                        <thead class="table-light">
                                            <tr class="text-center">

                                                <th class="no-sort"></th>
                                                <th>BOQ No</th>
                                                <th>BOQ Date</th>
                                                <th>Material Total</th>
                                                <th>Labor Total</th>
                                                <th>Equipment Total</th>
                                                <th>Grand Total</th>
                                                <th>Prepared By</th>
                                                <th>Prepared Date</th>
                                                <th>Status</th>
                                                <th>Remarks</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($boqs as $boq)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><span class="badge badge bg-info">{{ $boq->boq_no }}</span></td>
                                                    <td>{{ $boq->boq_date }}</td>
                                                    <td>{{ $boq->material_total ?? '0' }}</td>
                                                    <td>{{ $boq->labor_total ?? '0' }}</td>
                                                    <td>{{ $boq->equipment_total ?? '0' }}</td>
                                                    <td>{{ $boq->grand_total ?? '0' }}</td>
                                                    <td>
                                                        <span
                                                            class="badge badge bg-success">{{ $boq->preparedBy?->name }}</span>
                                                    </td>

                                                    <td>{{ $boq->prepared_date }}</td>

                                                    <td>
                                                        @switch($boq->status)
                                                            @case('draft')
                                                                <span class="badge bg-warning text-dark">Draft</span>
                                                            @break

                                                            @case('pending')
                                                                <span class="badge bg-info">Pending</span>
                                                            @break

                                                            @case('approved')
                                                                <span class="badge bg-success">Approved</span>
                                                            @break

                                                            @case('rejected')
                                                                <span class="badge bg-danger">Rejected</span>
                                                            @break

                                                            @default
                                                                <span class="badge bg-info">Unknown</span>
                                                        @endswitch
                                                    </td>


                                                    <td>{{ $boq->remarks ?? '' }}</td>

                                                    <td class="text-center">
                                                        <div class="dropdown table-action">
                                                            <a href="#"
                                                                class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ti ti-dots-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                {{-- {{ route('projectmanage.projects.boq.edit', $project->id) }} --}}
                                                                <a class="dropdown-item" href="">
                                                                    <i class="ti ti-edit text-blue"></i>
                                                                    Edit
                                                                </a>
                                                                <a class="dropdown-item" href="#"
                                                                    data-bs-toggle="modal" data-bs-target="#delete_boq">
                                                                    <i class="ti ti-trash"></i>
                                                                    Delete
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="ti ti-clipboard-copy text-violet"></i>
                                                                    View BOQ
                                                                </a>

                                                                {{-- {{ route('projectmanage.projects.boq.detail', [$proposal->id, $boq->id]) }} --}}
                                                                <a class="dropdown-item"
                                                                    href="{{ route('projectmanage.projects.boq-approved', [$project->id, $boq->id]) }}">
                                                                    <i class="ti ti-checks text-green"></i>
                                                                    Mark as Approved
                                                                </a>

                                                                {{-- "{{ route('clientmanage.draft.quotation-proposal', $proposal->id) }} --}}
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="return confirm('Are you sure you want to mark this as drafted?')">
                                                                    <i class="ti ti-file"></i>
                                                                    Mark as Draft
                                                                </a>

                                                                {{-- {{ route('clientmanage.decline.quotation-proposal', $proposal->id) }} --}}
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="return confirm('Are you sure you want to mark this as declined?')">
                                                                    <i class="ti ti-sticker text-blue"></i>
                                                                    Mark as Declined
                                                                </a>
                                                                <a class="dropdown-item" href="javascript:void(0);">
                                                                    <i class="ti ti-printer"></i>
                                                                    Print
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="datatable-length"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="datatable-paginate"></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>



                </div>

            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#boq-table').DataTable({
                lengthChange: false,
                searching: true,
                ordering: true,
                dom: 'lfrtip',
                columnDefs: [{
                    orderable: true,
                    targets: [0, 1, 7]
                }],
                dom: 'rtip'
            });
        });
    </script>
@endpush
