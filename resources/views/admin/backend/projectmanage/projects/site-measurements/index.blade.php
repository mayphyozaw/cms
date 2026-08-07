@extends('layouts.app')

@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">
                    Site Measurements
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="">
                                Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">
                                Project
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Site Measurement Lists
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

        <div class="row">
            <div class="card border-0 rounded-0">
                <div class="card-header d-flex align-items-center justify-content-between gap-2 flex-wrap">
                    <div class="input-icon input-icon-start position-relative">
                        <span class="input-icon-addon text-dark"><i class="ti ti-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <h5 class="d-flex align-items-center mb-0">
                        Site Measurements
                        <span class="badge bg-soft-danger ms-2 text-dark fs-12">
                            {{ $siteMeasurementAllData->count() }}
                        </span>
                    </h5>
                    <a href="{{ route('projectmanage.projects.site-measurements.create', $project->id) }}"
                        class="btn btn-md btn-primary d-flex align-items-center">
                        <i class="ti ti-circle-plus me-2"></i>
                        Add New Site Measurement
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div>
                    <div class="card border-0">

                        <div class="card-body pb-0 pt-0 px-2">

                            <ul class="nav nav-tabs nav-bordered nav-bordered-primary">

                                <li class="nav-item me-3">
                                    <a href="{{ route('projectmanage.projects.site-measurements.index', $project->id) }}"
                                        class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.site-measurements.index') ? 'active' : '' }}">
                                        <i class="ti ti-settings-cog me-2"></i>
                                        Site Measurement Lists
                                    </a>
                                </li>

                                <li class="nav-item me-3">
                                    @isset($siteMeasurement)
                                        <a href="{{ route('projectmanage.projects.site-measurement-detail.index', [$project->id, $siteMeasurement->id]) }}"
                                            class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.site-measurement-detail.*') ? 'active' : '' }}">
                                            <i class="ti ti-list-details me-2"></i>
                                            Site Measurement Detail
                                        </a>
                                    @else
                                        <span class="nav-link p-2 text-muted">
                                            <i class="ti ti-list-details me-2"></i>
                                            Site Measurement Detail
                                        </span>
                                    @endisset
                                </li>


                            </ul>

                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-light px-2 shadow"
                                    data-bs-toggle="dropdown">
                                    All Site Measurements
                                </a>
                                <div class="dropdown-menu">
                                    <ul style="list-style:none !important;">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                All Site Measurements
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
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-light px-2 shadow"
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
                            {{-- <div id="reportrange" class="reportrange-picker d-flex align-items-center shadow">
                                <i class="ti ti-calendar-due text-dark fs-14 me-1"></i>
                                <span class="reportrange-picker-field">
                                    9 Jun 25 - 9 Jun 25
                                </span>
                            </div>
                            <div id="reportrange" class="reportrange-picker d-flex align-items-center shadow">
                                <i class="ti ti-calendar-due text-dark fs-14 me-1"></i>
                                <span></span>
                            </div>

                            <input type="hidden" name="start_date" id="start_date">
                            <input type="hidden" name="end_date" id="end_date"> --}}
                        </div>
                        <div class="d-flex align-items-center gap-2 flex-wrap" hidden>
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
                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Subject</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">
                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Send To</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">
                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Total Value</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch">
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Date</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Open till</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Type</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Project</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Status</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-0">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">
                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
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
                            <table id="siteMeasurementsTable" class="table">
                                <thead class="table-light">
                                    <tr>
                                        
                                        <th class="no-sort"></th>
                                        <th class="no-sort"></th>
                                        <th>Details</th>
                                        <th>Measurement No</th>
                                        <th>Project Code</th>
                                        <th>Measurement Date</th>
                                        <th>Created By</th>
                                        {{-- <th>Approved By</th> --}}
                                        <th>Status</th>
                                        <th>Remark</th>
                                        <th class="text-end no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siteMeasurementAllData as $siteMeasurement)
                                        <tr>
                                            <td></td>
                                            
                                            
                                            <td>{{ $loop->iteration }}</td>
                                            <td>

                                                <a href="{{ route('projectmanage.projects.site-measurement-detail.index', [$project->id, $siteMeasurement->id]) }}"
                                                    class="btn btn-sm btn-success">
                                                    Detail
                                                </a>


                                            </td>
                                            <td>{{ $siteMeasurement->measurement_no }}</td>
                                            <td>{{ $project->client->project_code }}</td>
                                            <td>{{ $siteMeasurement->measurement_date }}</td>
                                            <td>
                                                <span
                                                    class="badge badge bg-success">{{ $siteMeasurement->creator?->name }}</span>
                                            </td>

                                            {{-- <td></td> --}}


                                            @php
                                                if ($siteMeasurement->status == 'Pending') {
                                                    $status = 'Pending';
                                                } elseif ($proposal->status == 'Accepted') {
                                                    $status = 'Verified';
                                                } elseif ($proposal->status == 'Rejected') {
                                                    $status = 'Rejected';
                                                } else {
                                                    $status = 'Other';
                                                }
                                            @endphp

                                            <td class="text-center">
                                                <span
                                                    class="badge {{ $status == 'Verified' ? 'bg-success' : ($status == 'Requested' ? 'bg-teal' : ($status == 'Rejected' ? 'bg-warning' : 'bg-danger')) }}">
                                                    {{ $status }}
                                                </span>
                                            </td>
                                            <td>{{ $siteMeasurement->remarks }}</td>

                                            <td class="text-center">
                                                <div class="dropdown table-action">
                                                    <a href="#"
                                                        class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">

                                                        <a class="dropdown-item"
                                                            href="{{ route('projectmanage.projects.site-measurements.edit', [$project->id, $siteMeasurement->id]) }}">
                                                            <i class="ti ti-edit text-blue"></i>
                                                            Edit
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('projectmanage.projects.site-measurements.destroy', [$project->id, $siteMeasurement->id]) }}"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#delete_sitemeaurement">
                                                            <i class="ti ti-trash"></i>
                                                            Delete
                                                        </a>

                                                        {{-- <a class="dropdown-item"
                                                            href="{{ route('clientmanage.accept.quotation-proposal', $proposal->id) }}"
                                                            onclick="return confirm('Are you sure you want to mark this as accepted?')">
                                                            <i class="ti ti-checks text-green"></i>
                                                            Mark as Accepted
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('clientmanage.draft.quotation-proposal', $proposal->id) }}"
                                                            onclick="return confirm('Are you sure you want to mark this as drafted?')">
                                                            <i class="ti ti-file"></i>
                                                            Mark as Draft
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('clientmanage.decline.quotation-proposal', $proposal->id) }}"
                                                            onclick="return confirm('Are you sure you want to mark this as declined?')">
                                                            <i class="ti ti-sticker text-blue"></i>
                                                            Mark as Declined
                                                        </a> --}}
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
@endsection
@push('scripts')
    <script>
        $(document).on('click', '.deleteBtn', function(event) {
            event.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: "Are you sure?",
                text: "Delete this data!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"

            }).then((result) => {

                if (result.isConfirmed) {

                    form.submit();

                }

            });


        });

        $('#siteMeasurementsTable').DataTable({
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

        // $(document).ready(function() {

        // });
    </script>
@endpush
