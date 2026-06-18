@extends('layouts.app')
@section('content')
    <div class="content">

        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Material Requirements </h4>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Material Requirements
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

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
                                <a href="{{ route('projectmanage.projects.material-requirements.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.material-requirements.*') ? 'active' : '' }}">
                                    <i class="ti ti-settings-cog me-2"></i>
                                    Material Requirements
                                </a>
                            </li>


                        </ul>

                    </div>
                </div>

                {{-- Create From --}}
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Material Requirements Information</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('projectmanage.projects.material-requirements.store', $project->id) }}"
                                method="POST" id="submit-form" enctype="multipart/form-data">
                                @csrf


                                <div class="row mb-3">

                                    <label class="col-sm-3 form-label">
                                        Drawing Measurement:
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select name="drawing_measurement_id" id="drawing_measurement_id"
                                                class="form-control form-select">
                                                <option value="">Select Measurement Categories</option>
                                                @foreach ($drawingMeasurements as $drawingMeasurement)
                                                    <option value="{{ $drawingMeasurement->id }}">
                                                        {{ $drawingMeasurement->drawing->drawing_name }} -
                                                        {{ $drawingMeasurement->quantity }}
                                                        {{ $drawingMeasurement->unit }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Material Mapping:
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select name="material_mapping_id" id="material_mapping_id"
                                                class="form-control form-select">
                                                <option value="">Select Material Mapping</option>
                                                @foreach ($materialMappings as $materialMapping)
                                                    <option value="{{ $materialMapping->id }}">
                                                        {{ $materialMapping->category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Materials:
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select name="variable_asset_id" id="variable_asset_id"
                                                class="form-control form-select">
                                                <option value="">Select Material</option>
                                                @foreach ($variableAssets as $varilableAsset)
                                                    <option value="{{ $varilableAsset->id }}">
                                                        {{ $varilableAsset->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14 col-sm-3">
                                        Consumption Type:
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select name="consumption_type" class="form-control form-select"
                                                id="consumption_type">
                                                <option value="">Select consumption_type</option>
                                                <option value='coverage'> Coverage</option>
                                                <option value='fixed'> Fixed</option>
                                                <option value='mix_ratio'> Mix Ratio</option>
                                                <option value='percentage'> Percentage</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3" id="coverage_qty_div" style="display:none;">
                                    <label class="col-sm-3 form-label">
                                        Coverage Quantity
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" name="coverage_qty" class="form-control coverage_qty"
                                                id="coverage_qty">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3" id="percentage_div" style="display:none;">
                                    <label class="col-sm-3 form-label">
                                        Percentage
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="number" name="percentage" class="form-control"
                                                id="percentage_value">
                                            <div class="input-group-text">
                                                <i class="ti ti-percentage"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3" id="mix_ratio_div">
                                    <label class="col-sm-3 form-label">
                                        Mix Ratio Template
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select name="mix_ratio_template_id" id="mix_ratio_template_id"
                                                class="form-control form-select">
                                                <option value="">
                                                    Select Mix Ratio
                                                </option>

                                                @foreach ($mixRatios as $mixRatio)
                                                    <option value="{{ $mixRatio->id }}">
                                                        {{ $mixRatio->ratio_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3" id="volume_factor_div">
                                    <label class="col-sm-3 form-label">
                                        Dry Volume Factor
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="dry-volume-factor" name="dry_volume_factor"
                                            class="form-control dry-volume-factor">
                                    </div>
                                </div>

                                <div class="row mb-3" id="volume_factor_div" hidden>
                                    <label class="col-sm-3 form-label">
                                        Dry Volume
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="dry_volume" name="dry_volume" class="form-control"
                                            readonly>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Consumption Ratio
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="consumption_ratio" id="consumption_ratio"
                                            class="form-control consumption_ratio" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Waste Percentage
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="wastage_percentage"
                                                class="form-control wastage_percentage" id="wastage_percentage">
                                            <div class="input-group-text">
                                                <i class="ti ti-percentage"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Raw Quantity
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="raw_quantity" class="form-control quantity"
                                                id="quantity" readonly>
                                            <div class="input-group-text">
                                                <input type="text" name="unit" class="form-control unit"
                                                    id="unit" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14 col-sm-3">
                                        Base Quantity :
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input name="base_quantity" class="form-control base_quantity"
                                                id="base_quantity" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Final Quantity
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" name="final_quantity"
                                                class="form-control final_quantity" id="final_quantity" readonly>
                                            <div class="input-group-text">
                                                <input type="text" name="material_unit" class="form-control"
                                                    id="material_unit" readonly>
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

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>

            </div>


        </div>




    </div>
@endsection
@push('scripts')
<script>
$(document).ready(function () {

    // =========================
    // MATERIAL MAPPING
    // =========================
    $('#material_mapping_id').on('change', function () {

        let materialMappingId = $(this).val();

        $.ajax({
            url: "{{ route('projectmanage.material_mapping_get') }}",
            type: 'GET',
            data: {
                material_mapping_id: materialMappingId,
            },
            success: function (data) {

                $('#consumption_type').val(data.consumption_type);
                $('#variable_asset_id').val(data.variable_asset_id);
                $('#coverage_qty').val(data.coverage_qty);
                $('#consumption_ratio').val(data.consumption_ratio);
                $('#wastage_percentage').val(data.wastage_percentage);
                $('#material_unit').val(data.unit);

                if (data.mix_ratio_template_id) {
                    $('#mix_ratio_template_id').val(data.mix_ratio_template_id);
                }

                calculateBaseQuantity();
            }
        });
    });


    $('#drawing_measurement_id').on('change', function () {

        let drawingMeasurementId = $(this).val();

        $.ajax({
            url: "{{ route('projectmanage.drawing_measurement_get') }}",
            type: 'GET',
            data: {
                drawing_measurement_id: drawingMeasurementId
            },
            success: function (data) {

                $('#quantity').val(data.quantity);
                $('#unit').val(data.unit);

                calculateBaseQuantity();
            }
        });
    });


    $('#mix_ratio_template_id').on('change', function () {

        let mixRatioTempId = $(this).val();

        $.ajax({
            url: "{{ route('projectmanage.mix_ratio_get') }}",
            type: 'GET',
            data: {
                mix_ratio_template_id: mixRatioTempId
            },
            success: function (data) {

                $('#dry-volume-factor').val(data.dry_volume_factor);

                calculateBaseQuantity();
            }
        });
    });


    
    $(document).on('input change',
        '#quantity, #consumption_ratio, #dry-volume-factor, #wastage_percentage, #consumption_type',
        function () {
            calculateBaseQuantity();
        }
    );


    // =========================
    // BASE QUANTITY
    // =========================
    function calculateBaseQuantity() {

        let quantity = parseFloat($('#quantity').val()) || 0;
        let consumption_ratio = parseFloat($('#consumption_ratio').val()) || 0;
        let factor = parseFloat($('#dry-volume-factor').val()) || 0;
        let wastage = parseFloat($('#wastage_percentage').val()) || 0;

        let type = ($('#consumption_type').val() || '').trim();

        let base_quantity = 0;

        if (type === 'fixed' || type === 'coverage' || type === 'percentage') {

            base_quantity = quantity * consumption_ratio;

        } 
        else if (type === 'mix_ratio') {

            let dry_volume = quantity * factor;
            base_quantity = dry_volume * consumption_ratio;
        }

        $('#base_quantity').val(base_quantity.toFixed(2));

        calculateFinalQuantity();
    }

    function calculateFinalQuantity() {

        let base_quantity = parseFloat($('#base_quantity').val()) || 0;
        let wastage_percentage = parseFloat($('#wastage_percentage').val()) || 0;

        let final_quantity = base_quantity * (1 + wastage_percentage / 100);

        $('#final_quantity').val(final_quantity.toFixed(2));
    }

});
</script>
@endpush
