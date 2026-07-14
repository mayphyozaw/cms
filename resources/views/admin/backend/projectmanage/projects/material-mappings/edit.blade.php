@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Material Mappings</h4>
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
        </div>

        <div class="row justify-content-center">
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


                    </ul>

                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Material Mappings Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projectmanage.projects.material-mappings.update', [$project->id, $materialMapping->id]) }}"
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
                                                    {{$materialMapping->drawing_measurement_id == $drawingMeasurement->id ? 'selected' : ''}}
                                                    >
                                                    {{ $drawingMeasurement->drawing->drawing_name }} 
                                                </option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">

                                <label class="col-sm-3 form-label">
                                    Measurement Categories:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="measurement_category_id" id="measurement_category_id"
                                            class="form-control form-select">
                                            <option value="">Select Measurement Categories</option>
                                            @foreach ($measurementCategories as $measurementCategory)
                                                <option value="{{ $measurementCategory->id }}"
                                                    {{$materialMapping->measurement_category_id == $measurementCategory->id ? 'selected' : ''}}
                                                    >
                                                    {{ $measurementCategory->category_name }}

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
                                            @foreach ($varilableAssets as $varilableAsset)
                                                <option value="{{ $varilableAsset->id }}"
                                                    {{$materialMapping->variable_asset_id == $varilableAsset->id ? 'selected' : ''}}
                                                    >
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
                                            id="consumption_type_id">
                                            <option value="">Select consumption_type</option>
                                            <option value='coverage' {{ $materialMapping->consumption_type == 'coverage' ? 'selected' : '' }}
                                                > 
                                                Coverage
                                            </option>
                                            <option value='fixed'
                                                {{ $materialMapping->consumption_type == 'fixed' ? 'selected' : '' }}
                                                > 
                                                Fixed
                                            </option>
                                            <option value='mix_ratio'
                                                {{ $materialMapping->consumption_type == 'mix_ratio' ? 'selected' : '' }}
                                                > 
                                                Mix Ratio
                                            </option>
                                            <option value='percentage' {{ $materialMapping->consumption_type == 'percentage' ? 'selected' : '' }}
                                                > 
                                                Percentage
                                            </option>
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
                                        <input type="number" name="coverage_quantity" class="form-control" id="coverage_qty"
                                        value="{{$materialMapping->coverage_qty}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3" id="percentage_div" style="display:none;">
                                <label class="col-sm-3 form-label">
                                    Percentage
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="number" name="coverage_qty" class="form-control"
                                            id="percentage_value">
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
                                        <select name="mix_ratio_template_id" class="form-control form-select">

                                            <option value="">
                                                Select Mix Ratio
                                            </option>

                                            @foreach ($mixRatios as $mixRatio)
                                                <option value="{{ $mixRatio->id }}"
                                                    {{$materialMapping->mix_ratio_template_id == $mixRatio->id ? 'selected' : ''}}>
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
                                    <input type="text" name="consumption_ratio" id="consumption_ratio_input"
                                        class="form-control"
                                        value="{{$materialMapping->consumption_ratio}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Waste Percentage
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" name="wastage_percentage" class="form-control"
                                            value="{{$materialMapping->wastage_percentage}}">
                                        <div class="input-group-text">
                                            <i class="ti ti-percentage"></i>
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
                                        <input name="status" class="form-control" value="{{$materialMapping->status}}">
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
                                            {{$materialMapping->remark}}
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

            $('#consumption_type_id').change(function() {

                let selected = $(this).find(':selected');
                let type = $(this).val();

                $('#coverage_qty_div').hide();
                $('#percentage_div').hide();
                $('#mix_ratio_div').hide();

                $('#consumption_ratio_input').val('');

                if (type === 'coverage') {

                    $('#coverage_qty_div').show();
                    $('#consumption_ratio').show();


                } else if (type === 'fixed') {

                    $('#consumption_ratio').show();
                    $('#consumption_ratio_input').val(1);

                } else if (type === 'percentage') {

                    $('#percentage_div').show();
                    $('#consumption_ratio').show();

                } else if (type === 'mix_ratio') {


                    $('#mix_ratio_div').show();
                    $('#consumption_ratio').show();
                    $('#volume_factor_div').show();


                }

            });

            $('#coverage_qty').on('keyup change', function() {

                let coverage = parseFloat($(this).val());

                if (coverage > 0) {

                    let ratio = 1 / coverage;

                    $('#consumption_ratio_input')
                        .val(ratio.toFixed(6));
                }

            });



            $('#percentage_value').on('keyup change', function() {

                let percentage = parseFloat($(this).val());

                if (percentage > 0) {

                    let ratio = percentage / 100;

                    $('#consumption_ratio_input')
                        .val(ratio.toFixed(5));
                }

            });

            $('#mix_ratio_template_id').change(function() {

                let mixRatioTempId = $(this).val();

                $.ajax({
                    url: "{{ route('projectmanage.mix_ratio_get') }}",
                    type: 'GET',
                    data: {
                        mix_ratio_template_id: mixRatioTempId
                    },

                    success: function(data) {

                        $('#dry_volume_factor')
                            .val(data.dry_volume_factor);

                        $('#consumption_ratio_input')
                            .val(data.consumption_ratio);
                    }
                });

            });

            function loadMixRatioData() {

                let mixRatioId = $('#mix_ratio_template_id').val();
                let materialId = $('#variable_asset_id').val();

                if (!mixRatioId || !materialId) {
                    return;
                }

                $.ajax({
                    url: "{{ route('projectmanage.consumption-ratio-get') }}",
                    type: "GET",
                    data: {
                        mix_ratio_template_id: mixRatioId,
                        variable_asset_id: materialId
                    },
                    success: function(data) {

                        $('#dry_volume_factor').val(
                            data.dry_volume_factor
                        );

                        $('#consumption_ratio_input').val(
                            data.consumption_ratio
                        );
                    }
                });
            }

            $('#mix_ratio_template_id').change(function() {
                loadMixRatioData();
            });

            $('#variable_asset_id').change(function() {
                loadMixRatioData();
            });


        });
    </script>
@endpush
