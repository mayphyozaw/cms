@extends('layouts.app')
@section('content')
    <div class="content">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Material Mappings </h4>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Material Mappings
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">

                <a href="{{route('projectmanage.projects.index')}}" class="btn btn-outline-light shadow" >
                     <span style="color:black">{{ $project->client->project_code }} @
                        {{ $project->client->name }} - ({{ $project->client->length }} * {{ $project->client->width }}) -
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
                                <a href="{{ route('projectmanage.projects.material-mappings.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.material-mappings.index') ? 'active' : '' }}">
                                    <i class="ti ti-settings-cog me-2"></i>
                                    Material Mappings
                                </a>
                            </li>

                            {{-- <li class="nav-item me-3">
                                <a href="{{route('projectmanage.projects.material-requirements.index', $project->id)}}" 
                                    class="d-block p-2 fw-medium {{ request()->routeIs('projectmanage.projects.material-requirements.*') ? 'active' : '' }}">
                                    <i class="ti ti-moneybag me-2"></i>
                                    Material Requirements
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
                                <h5 class="card-title mb-0">Material Mappings Lists</h5>
                            </div>

                            <div class="col-auto">
                                <x-create-button
                                    href="{{ route('projectmanage.projects.material-mappings.create', $project->id) }}">
                                    Create Material Mappings
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
                            <table class="table table-bordered align-middle w-100 nowrap" id="materialMappingTable">
                                <thead>
                                    <tr>

                                        <th class="text-center" style="background-color: #9dd2e7">No</th>
                                        {{-- <th class="text-center" style="background-color: #9dd2e7">Code</th> --}}
                                        <th class="text-center" style="background-color: #9dd2e7">Drawing Name</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Mesurement Category</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Material</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Type</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Coverage Qty</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Percentage</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Dry Volume Factor</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Ratio</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Waste</th>
                                        {{-- <th class="text-center" style="background-color: #9dd2e7">Status</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Status</th> --}}
                                        <th class="text-center" style="background-color: #9dd2e7">Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($materialMappings as $materialMapping)
                                        <tr>
                                            <td class="text-center">

                                                {{ $loop->iteration }}
                                            </td>

                                            {{-- <td class="text-center">
                                                {{ $materialMapping->mixRatio?->code ?? 'N/A' }}
                                            </td> --}}

                                            <td class="text-center">
                                                {{ $materialMapping->drawingmeasurement?->drawing?->drawing_name ?? 'N/A' }}
                                            </td>

                                            <td class="text-center">
                                                {{ $materialMapping->category?->category_name }}
                                            </td>

                                            <td class="text-center">
                                                {{ $materialMapping->material->name }}
                                            </td>

                                            <td class="text-center">
                                                {{ $materialMapping->consumption_type }}
                                            </td>

                                            <td class="text-center">
                                                {{ number_format($materialMapping->coverage_qty, 2) }}
                                               
                                            </td>

                                            <td class="text-center">
                                                {{ $materialMapping->percentage ?? '-' }}
                                            </td>

                                            <td class="text-center">
                                                {{ $materialMapping->mixRatio->dry_volume_factor ?? '-' }}
                                            </td>

                                            <td class="text-center">

                                                {{ number_format($materialMapping->consumption_ratio, 5) }}

                                            </td>

                                            <td class="text-center">
                                                {{ $materialMapping->wastage_percentage }}
                                            </td>


                                            <td class="text-center">
                                                <a class="btn btn-icon btn-sm btn-info"
                                                    href="{{ route('projectmanage.projects.material-mappings.edit', [$project->id, $materialMapping->id]) }}">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form
                                                    action="{{ route('projectmanage.projects.material-mappings.destroy', [$project->id, $materialMapping->id]) }}"
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

        $('#materialMappingTable').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endpush
