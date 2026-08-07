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

                                <a href="{{ route('projectmanage.projects.labor-mappings.index', $project->id) }}"
                                    class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.labor-mappings.*') ? 'active' : '' }}">
                                    <i class="ti ti-moneybag me-2"></i>
                                    Labor Mapping
                                </a>

                                <a href="{{ route('projectmanage.projects.labor-requirements.index', $project->id) }}"
                                    class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.labor-requirements.*') ? 'active' : '' }}">
                                    <i class="ti ti-moneybag me-2"></i>
                                    Labor Requirements
                                </a>

                                <a href="{{ route('projectmanage.projects.equipment-mappings.index', $project->id) }}"
                                    class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.equipment-mappings.*') ? 'active' : '' }}">
                                    <i class="ti ti-moneybag me-2"></i>
                                    Equipment Mapping
                                </a>

                                <a href="{{ route('projectmanage.projects.equipment-requirements.index', $project->id) }}"
                                    class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.equipment-requirements.*') ? 'active' : '' }}">
                                    <i class="ti ti-moneybag me-2"></i>
                                    Equipment Requirements
                                </a>

                                <a href="{{ route('projectmanage.projects.boq.index', $project->id) }}" class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.boq.*') ? 'active' : '' }}">
                                    <i class="ti ti-moneybag me-2"></i>
                                    BOQ
                                </a>

                                <a href="{{ route('projectmanage.projects.site-measurements.index', $project->id) }}"
                                    class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.site-measurements.*') ? 'active' : '' }}">
                                    <i class="ti ti-list-check me-2"></i>
                                    Site Measurements
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

                            {{-- <li class="nav-item me-3">
                                <a href="{{ route('projectmanage.projects.measurement-categories.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.measurement-categories.index') ? 'active' : '' }}">
                                    <i class="ti ti-device-laptop me-2"></i>
                                    Measurement Categories
                                </a>
                            </li> --}}

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
                                        
                                        <th class="text-center" style="background-color: #9dd2e7">Project</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Measurement No</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Measurement Date</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Created By</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Status</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Remarks</th>
                                        <th class="text-center" style="background-color: #9dd2e7"> Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($siteMeasurementAllData as $siteMeasurementData)
                                        <tr>
                                            
                                            <td class="text-center"> 
                                                {{ $project->client->project_code }}
                                            </td>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->measurement_no ?? ''}}
                                            </td>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->measurement_date}}
                                            </td>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->creator?->name}}
                                            </td>
                                            <td class="text-center"> 
                                                {{$siteMeasurementData->status}}
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
                                                    action="{{ route('projectmanage.projects.site-measurements.destroy', [$project->id, $siteMeasurementData->id]) }}"
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
            autoWidth: false,
            ordering: false,
        });
    </script>
@endpush
