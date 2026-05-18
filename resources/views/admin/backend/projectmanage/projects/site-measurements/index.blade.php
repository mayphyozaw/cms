@extends('layouts.app')

@section('content')
    <div class="content">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Site Measurements Lists</h4>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Site Measurements Lists
                        </li>
                    </ol>
                </nav>
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

                                <a href="{{ route('projectmanage.projects.site-measurements.index', $project->id) }}"
                                    class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.site-measurements.*') ? 'active' : '' }}">
                                    <i class="ti ti-list-check me-2"></i>
                                    Site Measurements
                                </a>

                                
                                <a href="#" class="d-block p-2 fw-medium">
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
                                <a href="{{ route('projectmanage.projects.site-measurements.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.site-measurements.index') ? 'active' : '' }}">
                                    <i class="ti ti-settings-cog me-2"></i>
                                    Site Measurement Lists
                                </a>
                            </li>

                            <li class="nav-item me-3">
                                <a href="{{ route('projectmanage.projects.measurement-categories.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.measurement-categories.index') ? 'active' : '' }}">
                                    <i class="ti ti-device-laptop me-2"></i>
                                    Measurement Categories
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>

                {{-- Table --}}
                <div class="card mb-0">

                    <div class="card-header">

                        <div class="row align-items-center">

                            <div class="col">
                                <h5 class="card-title mb-0">Site Measurement Lists</h5>
                            </div>

                            <div class="col-auto">
                                <x-create-button
                                    href="{{ route('projectmanage.projects.site-measurements.create', $project->id) }}">
                                    Create Site Measurement
                                </x-create-button>
                            </div>

                        </div>

                    </div>
                    <style>
                        .table-responsive {
                            width: 100%;
                            overflow-x: auto;
                        }

                        table {
                            width: 100% !important;
                        }
                    </style>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle w-100 nowrap" id="siteMeasurementsTable">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="background-color: #9dd2e7">Date</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Project</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Drawing Name</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Common Categories</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Length</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Width</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Height</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Unit Weight</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Unit</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Quantity</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Rate</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Total</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Remarks</th>
                                        <th class="text-center" style="background-color: #9dd2e7"> Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($siteMeasurementAllData as $siteMeasurementData)
                                        <tr>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->created_at}}
                                            </td>
                                            <td class="text-center"> 
                                                P- {{ $project->client->project_code }}
                                            </td>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->drawing->drawing_name}}
                                            </td>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->measurementCategory->category_name}}
                                            </td>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->length}}
                                            </td>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->width}}
                                            </td>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->height}}
                                            </td>
                                            
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->unit_weight}}
                                            </td>

                                            <td class="text-center"> 
                                                {{$siteMeasurementData->measurementCategory->unit}}
                                            </td>

                                            <td class="text-center"> 
                                                {{$siteMeasurementData->quantity}}
                                            </td>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->rate}}
                                            </td>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->total}}
                                            </td>

                                            <td class="text-center"> 
                                                {{$siteMeasurementData->remarks}}
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-icon btn-sm btn-info"
                                                    href="{{ route('projectmanage.projects.site-measurements.edit', [$project->id, $siteMeasurementData->id]) }}">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form
                                                    action="{{ route('projectmanage.projects.drawing-measurements.destroy', [$project->id, $siteMeasurementData->id]) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm btn-icon deleteBtn">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                               
                            </table>
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
            responsive: true,
            autoWidth: false
        });
    </script>
@endpush
