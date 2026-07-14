@extends('layouts.app')

@section('content')
    <div class="content">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Drawings Measurement Detail</h4>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Drawing Measurement Detail
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">

                <a href="{{ route('projectmanage.projects.index') }}" class="btn btn-outline-light shadow">
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
                                <a href="{{ route('projectmanage.projects.drawing-measurements.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.drawing-measurements.index') ? 'active' : '' }}">
                                    <i class="ti ti-settings-cog me-2"></i>
                                    Drawing Measurements Lists
                                </a>
                            </li>

                            <li class="nav-item me-3">
                                <a href="{{ route('projectmanage.projects.measurement-categories.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.measurement-categories.index') ? 'active' : '' }}">
                                    <i class="ti ti-device-laptop me-2"></i>
                                    Measurement Categories
                                </a>
                            </li>

                            <li class="nav-item me-3">
                                <a href="{{ route('projectmanage.projects.drawing-measurement-detail.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.drawing-measurement-detail.index') ? 'active' : '' }}">
                                    <i class="ti ti-device-laptop me-2"></i>
                                    Details
                                </a>
                            </li>

                            {{-- <li class="nav-item me-3">
                                <a href="{{ route('projectmanage.projects.drawing-measurement-deduction.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.drawing-measurement-deduction.index') ? 'active' : '' }}">
                                    <i class="ti ti-device-laptop me-2"></i>
                                    Deduction
                                </a>
                            </li> --}}

                            {{-- <li class="nav-item me-3">
                                <a href="{{ route('projectmanage.projects.measurement-types.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.measurement-types.index') ? 'active' : '' }}">
                                    <i class="ti ti-device-laptop me-2"></i>
                                    Measurement Types
                                </a>
                            </li>


                            <li class="nav-item me-3">
                                <a href="{{ route('projectmanage.projects.work-types.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.work-types.index') ? 'active' : '' }}">
                                    <i class="ti ti-device-laptop me-2"></i>
                                    Work Types
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
                                <h5 class="card-title mb-0">Drawing Measurement Detail -
                                    {{-- {{ $details->measurement->id}}
                                    ({{ $measurement->category?->category_name }}) --}}
                                </h5>
                            </div>

                            <div class="col-auto">
                                <x-create-button
                                    href="{{ route('projectmanage.projects.drawing-measurements.create', $project->id) }}">
                                    Create Drawing Measurement Detail
                                </x-create-button>
                            </div>

                        </div>

                    </div>

                    <div class="card-body pb-0">

                        <div class="table-responsive">

                            <table class="table table-bordered table-hover text-nowrap" id="drawingMeasurementTableId"
                                style="width:100%;">

                                <thead>
                                    <tr>
                                        <th class="text-center" style="background-color: #9dd2e7">No.</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Deduction</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Description</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Formula</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Nos</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Length</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Width</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Height</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Deduction</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Gross Quantity</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Net Quantity</th>
                                        <th class="text-center" style="background-color: #9dd2e7">Unit</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            
                                            <td class="text-center">
                                                <a href="{{ route('projectmanage.projects.drawing-measurement-deduction.create', [
                                                    'project' => $project->id,
                                                    'detail' => $detail->id,]) }}"
                                                    class="btn btn-sm btn-outline-danger shadow">
                                                    Deduction
                                                </a>
                                               
                                                <a href="{{ route('projectmanage.projects.drawing-measurement-deduction.index', [
                                                    'project' => $project->id,
                                                    'detail' => $detail->id,]) }}"
                                                    class="btn btn-sm btn-outline-success shadow">
                                                    Deduction Detail
                                                </a>
                                            </td>

                                            {{-- <td>
                                                @if ($detail->drawingMeasurement->category->formula_types == 'brick_wall_area')
                                                    <a href="{{ route('projectmanage.projects.drawing-measurement-deduction.create', [$project, $detail]) }}"
                                                        class="btn btn-sm bg-primary text-white">
                                                        Deduction
                                                    </a>
                                                @endif
                                            </td> --}}
                                            <td>
                                                {{ $detail->description }}
                                            </td>
                                            <td>
                                                {{ $detail->drawingMeasurement->category->formula_types }}
                                            </td>
                                            <td>
                                                {{ $detail->nos }}
                                            </td>
                                            <td>
                                                {{ $detail->length }}
                                            </td>
                                            <td>
                                                {{ $detail->width }}
                                            </td>
                                            <td>
                                                {{ $detail->height }}
                                            </td>
                                            <td>
                                                {{ $detail->deduction ?? '0' }}
                                            </td>
                                            <td>
                                                {{ $detail->gross_quantity }}
                                            </td>
                                            <td>
                                                {{ $detail->net_quantity }}
                                            </td>
                                            <td>
                                                {{ $detail->unit }}
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
        $('#drawingMeasurementTableId').DataTable({
            responsive: true,
            autoWidth: false
        });
    </script>
@endpush
