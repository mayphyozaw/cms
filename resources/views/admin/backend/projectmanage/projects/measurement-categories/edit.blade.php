@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Categories</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('projectmanage.projects.site-measurements.index', $project->id) }}">Site
                                Measurement</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Measurement Categories</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Measurement Categories Information</h5>
                </div>

                <div class="card-body">
                    <form
                        action="{{ route('projectmanage.projects.measurement-categories.update', [$project->id, $category->id]) }}"
                        method="POST" id="submit-form" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Name:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="category_name" class="form-control"
                                        value="{{ $category->category_name }}">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label fs-14">
                                    Formula Type:
                                </label>

                                <select name="formula_types" class="form-control select2" id="formulaTypes">
                                    <option value="">Select Formula Type</option>


                                    <option value="volume" {{ $category->formulaTypes == 'volume' ? 'selected' : '' }}>
                                        Volume
                                    </option>

                                    <option value="excavation_volume"
                                        {{ $category->formulaTypes == 'excavation_volume' ? 'selected' : '' }}>
                                        Excavation Volume
                                    </option>

                                    <option value="pcc_1:3:6"
                                        {{ $category->formulaTypes == 'pcc_1:3:6' ? 'selected' : '' }}>
                                        PCC 1:3:6
                                    </option>

                                    <option value="pcc_volume"
                                        {{ $category->formulaTypes == 'pcc_volume' ? 'selected' : '' }}>
                                        PCC Volume
                                    </option>

                                    <option value="rcc_footing"
                                        {{ $category->formulaTypes == 'rcc_footing' ? 'selected' : '' }}>
                                        RCC Footing
                                    </option>

                                    <option value="rcc_column"
                                        {{ $category->formulaTypes == 'rcc_column' ? 'selected' : '' }}>
                                        RCC Column
                                    </option>

                                    <option value="area" {{ $category->formulaTypes == 'area' ? 'selected' : '' }}>
                                        Area
                                    </option>

                                    <option value="wall_area"
                                        {{ $category->formulaTypes == 'wall_area' ? 'selected' : '' }}>
                                        Wall Area
                                    </option>

                                    <option value="painting_area"
                                        {{ $category->formulaTypes == 'painting_area' ? 'selected' : '' }}>
                                        Painting Area
                                    </option>

                                    <option value="plaster_area"
                                        {{ $category->formulaTypes == 'plaster_area' ? 'selected' : '' }}>
                                        Plaster Area
                                    </option>



                                    <option value="plaster_volume"
                                        {{ $category->formulaTypes == 'plaster_volume' ? 'selected' : '' }}>
                                        Plaster Volume
                                    </option>

                                    <option value="screed_area"
                                        {{ $category->formulaTypes == 'screed_area' ? 'selected' : '' }}>
                                        Screed Area
                                    </option>

                                    <option value="screed_volume"
                                        {{ $category->formulaTypes == 'screed_volume' ? 'selected' : '' }}>
                                        Screed Volume
                                    </option>

                                    <option value="concrete_slab_area"
                                        {{ $category->formulaTypes == 'concrete_slab_area' ? 'selected' : '' }}>
                                        Concrete Slab Area
                                    </option>

                                    <option value="concrete_slab_volume"
                                        {{ $category->formulaTypes == 'concrete_slab_volume' ? 'selected' : '' }}>
                                        Concrete Slab Volume
                                    </option>

                                    <option value="brick_wall_area"
                                        {{ $category->formulaTypes == 'brick_wall_area' ? 'selected' : '' }}>
                                        Brick Wall Area
                                    </option>

                                    <option value="brick_wall_volume"
                                        {{ $category->formulaTypes == 'brick_wall_volume' ? 'selected' : '' }}>
                                        Brick Wall Volume
                                    </option>

                                    <option value="mortar_bed_area"
                                        {{ $category->formulaTypes == 'mortar_bed_area' ? 'selected' : '' }}>
                                        Mortar Bed Area
                                    </option>

                                    <option value="mortar_bed_volume"
                                        {{ $category->formulaTypes == 'mortar_bed_volume' ? 'selected' : '' }}>
                                        Mortar Bed Volume
                                    </option>



                                    <option value="steel_linear"
                                        {{ $category->formulaTypes == 'steel_linear' ? 'selected' : '' }}>
                                        Steel Linear
                                    </option>

                                    <option value="steel_handrail_linear"
                                        {{ $category->formulaTypes == 'steel_handrail_linear' ? 'selected' : '' }}>
                                        Steel Handrail Linear
                                    </option>

                                    <option value="weight" {{ $category->formulaTypes == 'weight' ? 'selected' : '' }}>
                                        Weight
                                    </option>

                                    <option value="quantity" {{ $category->formulaTypes == 'quantity' ? 'selected' : '' }}>
                                        Quantity Only
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fs-14">
                                    Symbol:
                                </label>

                                <input type="text" name="symbol" id="symbol" class="form-control" readonly>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">
                                        Formula:
                                    </label>

                                    <input type="text" name="formulas" id="formulas" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">
                                        Unit:
                                    </label>
                                    <input type="text" name="unit" id="category_unit" class="form-control" readonly>
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
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            $('#formulaTypes').on('change', function() {


                let symbol = '';
                let unit = '';
                let formulas = '';
                let thickness = parseFloat($('#thickness_ft').val()) || 0;

                switch (this.value) {

                    case 'volume':
                        symbol = 'V';
                        formulas = 'L * W * H';
                        unit = 'CFT';
                        break;

                    case 'excavation_volume':
                        symbol = 'V';
                        formulas = 'Nos * L * W * H';
                        unit = 'CFT';
                        break;

                    case 'pcc_1:3:6':
                        symbol = 'V';
                        formulas = 'Nos * L * W * H';
                        unit = 'CFT';
                        break;


                    case 'pcc_volume':
                        symbol = 'V';
                        formulas = 'Nos * L * W * thickness';
                        unit = 'CFT';
                        break;

                    case 'rcc_footing':
                        symbol = 'V';
                        formulas = 'L * W * H';
                        unit = 'CFT';
                        break;

                    case 'rcc_column':
                        symbol = 'V';
                        formulas = 'Nos * L * W * H';
                        unit = 'CFT';
                        break;


                    case 'area':
                        symbol = 'A';
                        formulas = 'L * W';
                        unit = 'sqft';
                        break;

                    case 'wall_area':
                        symbol = 'WallArea';
                        formulas = 'L * H';
                        unit = 'Rft';
                        break;

                    case 'coats_area':
                        symbol = 'CoatArea';
                        formulas = 'L * H * coats';
                        unit = 'sqft';
                        break;

                    case 'painting_area':
                        symbol = 'PaintingArea';
                        formulas = 'L * H';
                        unit = 'sqft'
                        break;

                    case 'plaster_area':
                        symbol = 'PlasterArea';
                        formulas = 'L * H';
                        unit = 'sqft'
                        break;

                    case 'plaster_volume':
                        symbol = 'PlasterVolume';
                        formulas = '(2 * (L + W) * H) * thickness';
                        unit = 'CFT'
                        break;


                    case 'screed_area':
                        symbol = 'ScreedArea';
                        formulas = 'L * W';
                        unit = 'sqft'
                        break;

                    case 'screed_volume':
                        symbol = 'ScreedVolume';
                        formulas = '(L * W) * thickness';
                        unit = 'CFT'
                        break;

                    case 'concrete_slab_area':
                        symbol = 'ConcreteSlabArea';
                        formulas = 'L * W';
                        unit = 'sqft'
                        break;

                    case 'concrete_slab_volume':
                        symbol = 'concreteSlabVolume';
                        formulas = '(L * W) * thickness';
                        unit = 'CFT'
                        break;

                    case 'brick_wall_area':
                        symbol = 'BrickWallArea';
                        formulas = '(L + W) * 2 * H';
                        unit = 'sqft'
                        break;

                    case 'brick_wall_volume':
                        symbol = 'BrickWallVolume';
                        formulas = '(L * H)* thickness';
                        unit = 'CFT'
                        break;

                    case 'mortar_bed_area':
                        symbol = 'MortarBedArea';
                        formulas = 'L * W';
                        unit = 'sqft'
                        break;

                    case 'mortar_bed_volume':
                        symbol = 'MortarBedVolume';
                        formulas = '(L * W) * thickness';
                        unit = 'CFT'
                        break;

                    case 'steel_linear':
                        symbol = 'L';
                        formulas = 'L';
                        unit = 'kg'
                        break;

                    case 'steel_handrail_linear':
                        symbol = 'L';
                        formulas = 'L';
                        unit = 'Rft';
                        break;

                    case 'weight':
                        symbol = 'W';
                        formulas = 'L * Unit Weight';
                        unit = 'ton';
                        break;
                }


                document.getElementById('symbol').value = symbol;
                document.getElementById('formulas').value = formulas;
                document.getElementById('category_unit').value = unit;


            });
        });
    </script>
@endpush
