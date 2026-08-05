@extends('layouts.app')
@section('content')
    <div class="content">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Equipment Requirements </h4>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Equipment Requirements
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">

                <a href="{{ route('projectmanage.projects.index') }}" class="btn btn-outline-light shadow">
                    <span style="color:black">{{ $project->client->project_code }} @
                        {{ $project->client->name }} - ({{ $project->client->length }} * {{ $project->client->width }}) -
                        {{ $project->client->building_area }} Sq.ft
                    </span>
                </a>

            </div>
        </div>
        <style>
            .card,
            .card-body,
            .content {
                overflow: visible !important;
            }
        </style>

        <div class="row">

            {{-- Sidebar --}}
            <div class="col-xl-3 col-lg-12 theiaStickySidebar" hidden>

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
                                <a href="{{ route('projectmanage.projects.equipment-requirements.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.equipment-requirements.*') ? 'active' : '' }}">
                                    <i class="ti ti-settings-cog me-2"></i>
                                    Equipment Requirements
                                </a>
                            </li>


                        </ul>

                    </div>
                </div>

                {{-- Create From --}}
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Equipment Requirements Information</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('projectmanage.projects.equipment-requirements.store', $project->id) }}"
                                method="POST" id="submit-form" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">

                                    <label class="col-12 col-md-3 form-label">
                                        Drawing Measurement:
                                    </label>

                                    <div class="col-12 col-md-9">

                                        <select name="drawing_measurement_id" id="drawing_measurement_id"
                                            class="form-control select2">

                                            <option value="">Select Drawing Measurements</option>
                                            @foreach ($drawingMeasurements as $drawingMeasurement)
                                                <option value="{{ $drawingMeasurement->id }}">
                                                    {{ $drawingMeasurement->drawing->drawing_name }} @
                                                    {{ $drawingMeasurement->category->category_name }} -
                                                    {{ $drawingMeasurement->quantity }}
                                                    {{ $drawingMeasurement->unit }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Equipment Mapping:
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="hidden" name="equipment_id" class="form-control"
                                                id="equipment_id">
                                            <select name="equipment_mapping_id" id="equipment_mapping_id"
                                                class="form-control select2">
                                                <option value="">Select Labor Mapping</option>
                                                @foreach ($equipmentMappings as $equipmentMapping)
                                                    <option value="{{ $equipmentMapping->id }}">
                                                        {{ $equipmentMapping->equipment->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Raw Quantity
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="measurement_qty" class="form-control"
                                                id="quantity" readonly>
                                            <div class="input-group-text">
                                                <input type="text" name="unit" class="form-control" id="unit"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Productivity
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="productivity" class="form-control"
                                                id="productivity" readonly>
                                            <div class="input-group-text">
                                                <input type="text" class="form-control" id="productivity_unit"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Required Quantity
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="required_qty" class="form-control required_qty"
                                                id="required_qty" readonly>
                                            <div class="input-group-text">
                                                <input type="text" name="unit" class="form-control"
                                                    id="required_unit" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14 col-sm-3">
                                        Status:
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input name="status" class="form-control" />
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14 col-sm-3">
                                        Remark:
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea name="remark" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

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
            $('.select2').select2();
            $('#drawing_measurement_id').on('change', function() {

                let drawingMeasurementId = $(this).val();

                $.ajax({
                    url: "{{ route('projectmanage.drawing_measurement_get') }}",
                    type: 'GET',
                    data: {
                        drawing_measurement_id: drawingMeasurementId
                    },
                    success: function(data) {

                        // console.log(data);


                        $('#quantity').val(data.quantity);

                        $('#unit').val(data.unit);

                        calculateRequireQuantity();
                    }
                });
            });

            $('#equipment_mapping_id').on('change', function() {

                let equipmentMappingId = $(this).val();

                $.ajax({
                    url: "{{ route('projectmanage.equipment_mapping_get') }}",
                    type: 'GET',
                    data: {
                        equipment_mapping_id: equipmentMappingId
                    },
                    success: function(data) {

                        $('#equipment_id').val(data.equipment_id);

                        $('#productivity').val(data.productivity);

                        $('#productivity_unit').val(data.productivity_unit);

                        $('#required_unit').val(data.unit);
                        $('#required_unit').val(data.required_unit);


                        calculateRequireQuantity();
                    }
                });
            });

            function calculateRequireQuantity() {
                let quantity = parseFloat($('#quantity').val()) || 0;
                let productivity = parseFloat($('#productivity').val()) || 0;
                let requiredQty = productivity > 0 ? quantity / productivity : 0;
                $('#required_qty').val(requiredQty.toFixed(2));
            }

        });
    </script>
@endpush
