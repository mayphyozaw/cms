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
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Material Mappings Information</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('projectmanage.projects.material-mappings.store', $project->id) }}"
                        method="POST" id="submit-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Measurement Categories:
                                    </label>
                                    <select name="measurement_category_id" id="measurement_category_id"
                                        class="form-control form-select">
                                        <option value="">Select Measurement Categories</option>
                                        @foreach ($measurementCategories as $measurementCategory)
                                            <option value="{{ $measurementCategory->id }}">
                                                {{ $measurementCategory->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Material:
                                    </label>
                                    <select name="variable_asset_id" id="variable_asset_id"
                                        class="form-control form-select">
                                        <option value="">Select Material</option>
                                        @foreach ($varilableAssets as $varilableAsset)
                                            <option value="{{ $varilableAsset->id }}">{{ $varilableAsset->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12" hidden>
                                <div class="mb-3">
                                    <label class="form-label">
                                        Mix Ratio Template Code:
                                    </label>
                                    <select name="mix_ratio_template_id" id="mix_ratio_template_id"
                                        class="form-control form-select">
                                        <option value="">Select Code</option>
                                        @foreach ($mixRatios as $mixRatio)
                                            <option value="{{ $mixRatio->id }}">{{ $mixRatio->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Consumption Type:
                                </label>
                                <select name="consumption_type" class="form-control form-select" id="consumption_type">
                                    <option value="">Select consumption_type</option>
                                    <option value='coverage'> Coverage</option>
                                    <option value='fixed'> Fixed</option>
                                    <option value='mix_ratio'> Mix Ratio</option>
                                    <option value='percentage'> Percentage</option>
                                </select>

                            </div>


                            <div class="col-md-6 mb-3" id="coverage_qty_div" style="display:none;">
                                <label class="form-label">
                                    Coverage Quantity
                                </label>

                                <input type="number" name="coverage_qty" class="form-control">
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14" id="consumption_ratio">
                                    Consumption Ratio:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="consumption_ratio" class="form-control"
                                        value="{{ $consumption_ratio }}">
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Waste Percentage:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="wastage_percentage" class="form-control" value="1">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Status:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="status" class="form-control" value="1">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Remark:
                                </label>
                                <div class="input-group">
                                    <textarea name="remark" class="form-control"></textarea>
                                </div>
                            </div>


                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        document.getElementById('consumption_type').addEventListener('change', function() {

            let type = this.value;
            let ratio = document.getElementById('consumption_ratio');

            $('#coverage_qty_div').hide();

            switch (type) {

                case 'fixed':
                    ratio.value = 1;
                    break;

                case 'coverage':
                    ratio.value = '';
                    $('#coverage_qty_div').show();
                    break;

                case 'mix_ratio':
                    ratio.value = '';
                    break;

                case 'percentage':
                    ratio.value = 0.02;
                    break;

                default:
                    ratio.value = '';
            }

        });
    </script>
@endpush
