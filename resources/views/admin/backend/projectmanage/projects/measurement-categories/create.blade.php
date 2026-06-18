@extends('layouts.app')
@section('content')
    <div class="content pb-0">

        <!-- Start Page Header -->
        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2 mb-3">
            <div class="flex-grow-1">
                <h6 class="fw-bold mb-0 d-flex align-items-center">
                    <a href="{{ route('projectmanage.projects.index', $project->id) }}">
                        <i class="ti ti-chevron-left me-1 fs-14"></i>
                        Project
                    </a>
                </h6>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="card rounded-0 mb-0">
            <div class="card-header">
                <h6 class="fw-bold m-0"> Measurement Categories </h6>
            </div> <!-- end card-header -->


            <div class="card-body">
                <form action="{{ route('projectmanage.projects.measurement-categories.store', $project->id) }}"
                    method="POST" id="submit-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-12 mb-3">
                            <div class="col-lg-6 col-md-3 col-sm-12">
                                <div class="mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Name:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="category_name" class="form-control"
                                            @error('category_name') is-invalid @enderror placeholder="Enter Name" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-3 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">
                                        Formula Type:
                                    </label>

                                    <select name="formula_types" class="form-control form-select" id="formulaTypes">
                                        <option value="">Select Formula Type</option>

                                        <option value="volume">
                                            Volume
                                        </option>

                                        <option value="area">
                                            Area
                                        </option>

                                        <option value="wall_area">
                                            Wall-Area
                                        </option>

                                        <option value="coats_area">
                                            Coat Area
                                        </option>

                                        <option value="painting_area">
                                            Paint Area
                                        </option>

                                        <option value="plaster_area">
                                            Plaster Area
                                        </option>

                                        <option value="plaster_volume">
                                            Plaster Volume
                                        </option>

                                        <option value="screed_area">
                                            Screed Area
                                        </option>

                                        <option value="screed_volume">
                                            Screed Volume
                                        </option>

                                        <option value="concrete_slab_area">
                                            Concrete Slab Area
                                        </option>

                                        <option value="concrete_slab_volume">
                                            Concrete Slab Volume
                                        </option>

                                        <option value="brick_wall_area">
                                            Brick Wall Area
                                        </option>

                                        <option value="brick_wall_volume">
                                            Brick Wall Volume
                                        </option>

                                        <option value="mortar_bed_area">
                                            Mortar Bed Area
                                        </option>

                                        <option value="mortar_bed_volume">
                                            Mortar Bed Volume
                                        </option>


                                        <option value="steel_linear">
                                            Steel Linear
                                        </option>

                                        <option value="steel_handrail_linear">
                                            Steel Handrail Linear
                                        </option>

                                        <option value="weight">
                                            Weight
                                        </option>

                                        <option value="quantity">
                                            Quantity Only
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">
                                        Symbol:
                                    </label>

                                    <input type="text" name="symbol" id="symbol" class="form-control" readonly>
                                </div>
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
                    </div>
                    <div class="d-flex gap-2 align-items-center justify-content-start mb-0">
                        <button type="button" class="btn btn-light">Cancel</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.getElementById('formulaTypes')
                .addEventListener('change', function() {


                    let symbol = '';
                    let unit = '';
                    let formulas = '';
                    let thickness = parseFloat($('#thickness_ft').val()) || 0;

                    switch (this.value) {

                        case 'volume':
                            symbol = 'V';
                            formulas = 'L * W * H';
                            unit = 'ft³';
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
                            formulas = '2 * (L + W) * H';
                            unit = 'sqft'
                            break;


                        case 'plaster_area':
                            symbol = 'PlasterArea';
                            formulas = '2 * (L + W) * H';
                            unit = 'sqft'
                            break;

                        case 'plaster_volume':
                            symbol = 'PlasterVolume';
                            formulas = '(2 * (L + W) * H) * thickness';
                            unit = 'ft³'
                            break;


                        case 'screed_area':
                            symbol = 'ScreedArea';
                            formulas = 'L * W';
                            unit = 'sqft'
                            break;

                        case 'screed_volume':
                            symbol = 'ScreedVolume';
                            formulas = '(L * W) * thickness';
                            unit = 'ft³'
                            break;

                        case 'concrete_slab_area':
                            symbol = 'ConcreteSlabArea';
                            formulas = 'L * W';
                            unit = 'sqft'
                            break;
                        
                        case 'concrete_slab_volume':
                            symbol = 'concreteSlabVolume';
                            formulas = '(L * W) * thickness';
                            unit = 'ft³'
                            break;

                        case 'brick_wall_area':
                            symbol = 'BrickWallArea';
                            formulas = 'L * H';
                            unit = 'sqft'
                            break;

                        case 'brick_wall_volume':
                            symbol = 'BrickWallVolume';
                            formulas = '(L * H)* thickness';
                            unit = 'ft³'
                            break;

                        case 'mortar_bed_area':
                            symbol = 'MortarBedArea';
                            formulas = 'L * W';
                            unit = 'sqft'
                            break;

                        case 'mortar_bed_volume':
                            symbol = 'MortarBedVolume';
                            formulas = '(L * W) * thickness';
                            unit = 'ft³'
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
