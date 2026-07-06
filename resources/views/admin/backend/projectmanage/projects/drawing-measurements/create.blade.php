@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Drawings</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Drawing Measurements
                        </li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row">
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

                    </ul>

                </div>
            </div>
            <div class="col-sm-12">
                <div class="card border-0 rounded-0">
                    <div class="card-header">
                        <h5 class="card-title">Drawing Measurement Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projectmanage.projects.drawing-measurements.store', $project) }}"
                            method="POST" id="submit-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Project Code:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="project_id" class="form-control"
                                            value=" {{ $project->client->project_code }}" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Client Name:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="project_id" class="form-control"
                                            value="{{ $project->client->name }}" readonly disabled>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label class="form-label">
                                        Drawing: <span style="color:red;">*</span>
                                    </label>

                                    <select name="drawing_id" id="drawing_id" class="form-select">
                                        <option value="">Select Drawing</option>

                                        @foreach ($drawings as $drawing)
                                            <option value="{{ $drawing->id }}">
                                                {{ $drawing->drawing_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label class="form-label">
                                        Drawing Type: <span style="color:red;">*</span>
                                    </label>
                                    <select name="drawing_type_id" id="drawing_type_id" class="form-select">
                                        <option value="">Select Drawing Type</option>

                                        @foreach ($drawing_types as $drawing_type)
                                            <option value="{{ $drawing_type->id }}">
                                                {{ $drawing_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-12 col-lg-3 mb-3">
                                    <label class="form-label">
                                        Measurement Category: <span style="color:red;">*</span>
                                    </label>

                                    <select name="measurement_categories_id" id="category_id" class="form-select">
                                        <option value="">Select Measurement Category</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                data-formula="{{ $category->formula_types }}"
                                                data-symbol="{{ $category->symbol }}"
                                                data-cal-formula="{{ $category->formulas }}"
                                                data-unit="{{ $category->unit }}">

                                                {{ $category->category_name }}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-lg-3 mb-3" hidden>
                                    <label class="form-label">
                                        Formula Type:
                                    </label>

                                    <input type="text" id="formula_type" class="form-control" readonly>
                                </div>

                                <div class="col-12 col-lg-3 mb-3" hidden>
                                    <label class="form-label">
                                        Symbol:
                                    </label>

                                    <input type="text" id="symbol" class="form-control" readonly>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label class="form-label">
                                        Formula:
                                    </label>

                                    <input type="text" id="cal_formula" class="form-control" readonly>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        No of Footings:
                                    </label>

                                    <div class="col-sm-5">
                                        <input type="text" name="nos" class="form-control nos"
                                            @error('nos') is-invalid @enderror placeholder="Enter Nos" required
                                            value="0">
                                    </div>
                                </div>

                                
                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Length:
                                    </label>

                                    <div class="col-sm-5">
                                        <input type="text" name="length" class="form-control length"
                                            @error('length') is-invalid @enderror placeholder="Enter Length" required
                                            value="0">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Width:
                                    </label>

                                    <div class="col-sm-5">
                                        <input type="text" name="width" class="form-control width"
                                            @error('width') is-invalid @enderror placeholder="Enter Width" required
                                            value="0">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Height:
                                    </label>

                                    <div class="col-sm-5">
                                        <input type="text" name="height" class="form-control height"
                                            @error('height') is-invalid @enderror placeholder="Enter Height" required
                                            value="0">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Thickness
                                    </label>

                                    <div class="col-sm-1 lg-2">
                                        <select name="thickness_unit" id="thickness_unit" class="form-select">
                                            <option value="">Select Thickness Unit</option>
                                            <option value="inch">Inch</option>
                                            <option value="ft">Feet</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-2 lg-3">
                                        <input type="text" name="thickness" class="form-control"
                                            id="thickness_input">
                                    </div>

                                    <div class="col-sm-2 lg-3">
                                        <input type="text" name="thickness_ft" class="form-control"
                                            id="thickness_ft" readonly>
                                    </div>

                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Unit Weight:
                                    </label>

                                    <div class="col-sm-5">
                                        <input type="text" name="unit_weight" class="form-control unit_weight"
                                            @error('unit_weight') is-invalid @enderror placeholder="Enter Unit Weight"
                                            required value="0">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Coats:
                                    </label>

                                    <div class="col-sm-5">
                                        <input type="text" name="coats" class="form-control coats"
                                            @error('coats') is-invalid @enderror placeholder="Enter coats" required
                                            value="0">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Quantity:
                                    </label>

                                    <div class="col-sm-3">
                                        <input type="text" name="quantity" id="quantity" class="form-control"
                                            @error('quantity') is-invalid @enderror readonly>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="unit" id="unit" class="form-control" readonly>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-3 form-label">
                                        Remark:
                                    </label>

                                    <div class="col-sm-5">
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
    </div>

    </div>

    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            $('#client_id').on('change', function() {
                let clientId = $(this).val();
                $.ajax({
                    url: "{{ route('projectmanage.clients_get') }}",
                    type: 'GET',
                    data: {
                        client_id: clientId,
                    },

                    success: function(data) {
                        $('#address').val(data.address);
                        $('#client_code').val(data.client_code);
                        $('#project_code').val(data.project_code);
                        $('#site_location').val(data.site_location);
                        $('#building_area').val(data.building_area);
                        $('#construction_type').val(data.construction_type);
                        $('#job_scope').val(data.job_scope);
                        $('#storeys').val(data.storeys);
                        
                    },

                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
            });


            $('#drawing_id').on('change', function() {
                let drawingId = $(this).val();
                $.ajax({
                    url: "{{ route('projectmanage.drawings_get') }}",
                    type: 'GET',
                    data: {
                        drawing_id: drawingId,
                    },

                    success: function(data) {
                        console.log(data);
                        $('#drawing_type_id').val(data.drawing_type_id);
                    },

                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
            });

            $('#work_type_id').on('change', function() {
                let workTypeId = $(this).val();
                $.ajax({
                    url: "{{ route('projectmanage.worktype_get') }}",
                    type: 'GET',
                    data: {
                        work_type_id: workTypeId,
                    },

                    success: function(data) {
                        $('#unit').val(data.unit);
                        $('#measurement_type_id')
                            .val(data.measurement_type_id)
                            .trigger('change');

                        $('input[name="measurement_type"]').val(data.formula);

                    },

                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
            });

            $('#category_id').on('change', function() {

                let selected = $(this).find(':selected');

                let formula = selected.data('formula') || '';
                let symbol = selected.data('symbol') || '';
                let calFormula = selected.data('cal-formula') || '';
                let unit = selected.data('unit') || '';

                $('#formula_type').val(formula);
                $('#cal_formula').val(calFormula);
                $('#symbol').val(symbol);
                $('#unit').val(unit);


                calculateQuantity();
            });

            $('.nos, .length, .width, .height, .unit_weight, .coats, #thickness_ft').on('input', function() {

                calculateQuantity();

            });

            function calculateQuantity() {

                let nos = parseFloat($('.nos').val()) || 0;
                let length = parseFloat($('.length').val()) || 0;
                let width = parseFloat($('.width').val()) || 0;
                let height = parseFloat($('.height').val()) || 0;
                let coats = parseFloat($('.coats').val()) || 0;
                let unit_weight = parseFloat($('.unit_weight').val()) || 0;
                let thickness = parseFloat($('#thickness_ft').val()) || 0.00;


                let formula = $('#formula_type').val();

                let quantity = 0;

                if (formula === 'volume') {

                    quantity = length * width * height;

                }else if (formula === 'excavation_volume') {

                    quantity = nos * length * width * height;

                }else if (formula === 'pcc_1:3:6') {

                    quantity = nos * length * width * height;

                }else if (formula === 'rcc_footing') {

                    quantity = nos * length * width * height;

                }else if (formula === 'rcc_column') {

                    quantity = nos * length * width * height;

                }else if (formula === 'area') {

                    quantity = length * width;

                } else if (formula === 'wall_area') {

                    quantity = length * height;

                } else if (formula === 'painting_area') {

                    quantity = 2 * (length + width) * height;

                } else if (formula === 'plaster_area') {

                    quantity = 2 * (length + width) * height;

                } else if (formula === 'screed_area') {

                    quantity = length * width;

                } else if (formula === 'concrete_slab_area') {

                    quantity = length * width;

                } else if (formula === 'mortar_bed_area') {

                    quantity = length * width;

                } else if (formula === 'brick_wall_area') {

                    quantity = length * height;
                } else if (formula === 'linear') {

                    quantity = length;

                } else if (formula === 'weight') {

                    quantity = length * unit_weight;

                } else if (formula === 'coats_area') {

                    quantity = length * height * coats;

                } else if (formula == 'plaster_volume') {

                    quantity = (2 * (length + width) * height) * thickness;
                }else if (formula == 'concrete_slab_volume') {

                    quantity = length * width * thickness;
                }

                $('#quantity').val(quantity.toFixed(2));


            }


            $('#thickness_input').on('input', function() {

                let thicknessUnit = $('#thickness_unit').val();
                let thicknessInput = parseFloat($(this).val()) || 0;

                let thickness_ft = 0;

                if (thicknessUnit === 'inch') {
                    thickness_ft = thicknessInput / 12;
                } else {
                    thickness_ft = thicknessInput;
                }

                $('#thickness_ft').val(thickness_ft.toFixed(4));

                calculateQuantity();
            });


        });
    </script>
@endpush
