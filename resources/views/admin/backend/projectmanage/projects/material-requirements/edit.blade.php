@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Material Requirements</h4>
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

        <div class="row justify-content-center">
            <div class="card border-0">

                <div class="card-body pb-0 pt-0 px-2">

                    <ul class="nav nav-tabs nav-bordered nav-bordered-primary">

                        <li class="nav-item me-3">
                            <a href="{{ route('projectmanage.projects.material-requirements.index', $project->id) }}"
                                class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.material-requirements.index') ? 'active' : '' }}">
                                <i class="ti ti-settings-cog me-2"></i>
                                Material Mappings
                            </a>
                        </li>


                    </ul>

                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Material Requirements Information</h5>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ route('projectmanage.projects.material-requirements.update', [$project->id, $materialRequirement->id]) }}"
                            method="POST" id="submit-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                                <option value="{{ $drawingMeasurement->id }}"
                                                    {{ $materialRequirement->drawing_measurement_id == $drawingMeasurement->id ? 'selected' : '' }}>
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
                                                <option value="{{ $materialMapping->id }}"
                                                    {{ $materialRequirement->material_mapping_id == $materialMapping->id ? 'selected' : '' }}>
                                                    {{ $materialMapping->material->name }}
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
                                                <option value="{{ $varilableAsset->id }}"
                                                    {{ $materialRequirement->variable_asset_id == $varilableAsset->id ? 'selected' : '' }}>
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
                                        <select name="consumption_type" class="form-control select2" id="consumption_type">
                                            <option value="">Select Consumption Type</option>
                                            <option value='Coverage'
                                                {{ $materialRequirement->consumption_type == 'Coverage' ? 'selected' : '' }}>
                                                Coverage
                                            </option>
                                            <option value='Fixed'
                                                {{ $materialRequirement->consumption_type == 'Fixed' ? 'selected' : '' }}>
                                                Fixed</option>
                                            <option value='MixRatio'
                                                {{ $materialRequirement->consumption_type == 'MixRatio' ? 'selected' : '' }}>
                                                Mix Ratio</option>
                                            <option value='Percentage'
                                                {{ $materialRequirement->consumption_type == 'Percentage' ? 'selected' : '' }}>
                                                Percentage</option>
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
                                        <input type="number" name="coverage_qty" class="form-control" id="coverage_qty">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3" id="percentage_div" style="display:none;">
                                <label class="col-sm-3 form-label">
                                    Percentage
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="number" name="percentage" class="form-control" id="percentage_value"
                                            value="{{ $materialRequirement->percentage }}">
                                        <div class="input-group-text">
                                            <i class="ti ti-percentage"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3" id="mix_ratio_div" style="display:none;">
                                <label class="col-sm-3 form-label">
                                    Mix Ratio Template
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="mix_ratio_template_id" class="form-control form-select"
                                            id="mix_ratio_template_id">

                                            <option value="">
                                                Select Mix Ratio
                                            </option>

                                            @foreach ($mixRatios as $mixRatio)
                                                <option value="{{ $mixRatio->id }}"
                                                    {{ $materialRequirement->materialMapping->mix_ratio_template_id == $mixRatio->id ? 'selected' : '' }}>
                                                    {{ $mixRatio->ratio_name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Consumption Ratio
                                </label>
                                <div class="col-sm-9">
                                    <input type="text" name="consumption_ratio" id="consumption_ratio"
                                        class="form-control consumption_ratio" readonly
                                        value="{{ $materialRequirement->materialMapping->consumption_ratio }}">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Waste Percentage
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" name="wastage_percentage"
                                            class="form-control wastage_percentage" id="wastage_percentage"
                                            value="{{ $materialRequirement->materialMapping->wastage_percentage }}">
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
                                            id="quantity" value="{{ $materialRequirement->raw_quantity }}" readonly>
                                        <div class="input-group-text">
                                            <input type="text" name="unit" class="form-control unit"
                                                id="unit" value="{{ $materialRequirement->unit }}" readonly>
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
                                        <input name="base_quantity" class="form-control base_quantity" id="base_quantity"
                                            readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3" hidden>
                                <label for="form-label fs-14" class="form-label fs-14 col-sm-3">
                                    Dry Volume Factor :
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        
                                        <input name="dry_volume_factor" class="form-control dry_volume_factor"
                                            id="dry_volume_factor"
                                            value="{{ $materialRequirement->materialMapping->mixRatio?->dry_volume_factor }}" />
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Final Quantity
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" name="final_quantity" class="form-control final_quantity"
                                            id="final_quantity" readonly>
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
                                        <input name="status" class="form-control"
                                            value={{ $materialRequirement->status }} />
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="form-label fs-14" class="form-label fs-14 col-sm-3">
                                    Remark:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea name="remark" class="form-control">
                                            {{ $materialRequirement->remark }}
                                        </textarea>
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
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            let type = ($('#consumption_type').val() || '').trim();

            toggleConsumptionFields(type);
            calculateBaseQuantity();

            $('#material_mapping_id').on('change', function() {

                let materialMappingId = $(this).val();


                $.ajax({
                    url: "{{ route('projectmanage.material_mapping_get') }}",
                    type: 'GET',
                    data: {
                        material_mapping_id: materialMappingId,
                    },
                    success: function(data) {
                        
                        $('#consumption_type').val(data.consumption_type).trigger('change');
                        $('#variable_asset_id').val(data.variable_asset_id).trigger('change');
                        $('#coverage_qty').val(data.coverage_qty);
                        $('#consumption_ratio').val(data.consumption_ratio);
                        $('#wastage_percentage').val(data.wastage_percentage);
                        $('#material_unit').val(data.unit);
                        $('#mix_ratio_template_id').val(data.mix_ratio_template_id).trigger(
                            'change');
                        $('#dry_volume_factor').val(data.dry_volume_factor);

                        if (data.mix_ratio_template_id) {
                            $('#mix_ratio_template_id').val(data.mix_ratio_template_id).trigger(
                                'change');
                        }



                        calculateBaseQuantity();
                    }
                });
            });


            $('#mix_ratio_template_id').on('change', function() {

                let mixRatioTempId = $(this).val();

                $.ajax({
                    url: "{{ route('projectmanage.mix_ratio_get') }}",
                    type: 'GET',
                    data: {
                        mix_ratio_template_id: mixRatioTempId
                    },
                    success: function(data) {

                        $('#dry_volume_factor').val(data.dry_volume_factor);

                        calculateBaseQuantity();
                    }
                });
            });

            function toggleConsumptionFields(type) {

                $('#coverage_qty_div').hide();
                $('#consumption_ratio_div').hide();
                $('#percentage_div').hide();
                $('#mix_ratio_div').hide();
                $('#volume_factor_div').hide();

                switch (type) {

                    case 'Coverage':
                        $('#coverage_qty_div').show();
                        $('#consumption_ratio_div').show();
                        break;

                    case 'Fixed':
                        $('#consumption_ratio_div').show();
                        break;

                    case 'Percentage':
                        $('#percentage_div').show();
                        $('#consumption_ratio_div').show();
                        break;

                    case 'MixRatio':
                        $('#mix_ratio_div').show();
                        $('#volume_factor_div').show();
                        $('#consumption_ratio_div').show();
                        break;
                }
            }




            $(document).on('input change',
                '#quantity, #consumption_ratio, #dry_volume_factor, #wastage_percentage, #consumption_type',
                function() {
                    calculateBaseQuantity();
                }
            );



            function calculateBaseQuantity() {

                let quantity = parseFloat($('#quantity').val()) || 0;
                let consumption_ratio = parseFloat($('#consumption_ratio').val()) || 0;
                let factor = parseFloat($('#dry_volume_factor').val()) || 0;
                let wastage = parseFloat($('#wastage_percentage').val()) || 0;
                let coverage_qty = parseFloat($('#coverage_qty').val()) || 0;

                let type = ($('#consumption_type').val() || '').trim();

                let base_quantity = 0;


                if (type === 'Fixed') {

                    base_quantity = quantity * consumption_ratio;

                } else if (type === 'Coverage') {

                    base_quantity = quantity / coverage_qty;


                } else if (type == 'Percentage') {

                    base_quantity = quantity * (consumption_ratio / 100);

                } else if (type === 'MixRatio') {

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
