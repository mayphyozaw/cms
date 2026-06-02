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

                                <div class="col-12 col-lg-6 mb-3">
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

                                <div class="col-12 col-lg-6 mb-3">
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

                                <div class="col-12 col-lg-3 mb-3">
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

                                <div class="col-md-4 col-lg-3 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Unit:
                                        </label>

                                        <input type="text" name="unit" id="unit" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-2 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Length:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="length" class="form-control length"
                                            @error('length') is-invalid @enderror placeholder="Enter Length" required
                                            value="0">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-2 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Width:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="width" class="form-control width"
                                            @error('width') is-invalid @enderror placeholder="Enter Width" required
                                            value="0">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-2 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Height:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="height" class="form-control height"
                                            @error('height') is-invalid @enderror placeholder="Enter Height" required
                                            value="0">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Unit Weight:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="unit_weight" class="form-control unit_weight"
                                            @error('unit_weight') is-invalid @enderror placeholder="Enter Unit Weight"
                                            required value="0">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Coats:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="coats" class="form-control coats"
                                            @error('coats') is-invalid @enderror placeholder="Enter coats"
                                            required value="0">
                                    </div>
                                </div>


                                <div class="col-12 col-lg-4 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Quantity:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="quantity" id="quantity" class="form-control"
                                            @error('quantity') is-invalid @enderror readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-12 mb-3">
                                    <label class="form-label">
                                        Remark:
                                    </label>
                                    <textarea name="remark" class="form-control"></textarea>
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
                        $('#client_type').val(data.client_type);
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

            $('.length, .width, .height, .unit_weight, .coats').on('input', function() {

                calculateQuantity();

            });

            function calculateQuantity() {

                let length = parseFloat($('.length').val()) || 0;
                let width = parseFloat($('.width').val()) || 0;
                let height = parseFloat($('.height').val()) || 0;
                let coats = parseFloat($('.coats').val()) || 0;
                let unit_weight = parseFloat($('.unit_weight').val()) || 0;

                let formula = $('#formula_type').val();

                let quantity = 0;

                if (formula === 'volume') {

                    quantity = length * width * height;

                } else if (formula === 'area') {

                    quantity = length * width;

                } else if (formula === 'wall_area') {

                    quantity = length * height;

                } else if (formula === 'painting_area') {

                    quantity = 2 * (length + width) * height;

                } else if (formula === 'linear') {

                    quantity = length;

                } else if (formula === 'weight') {

                    quantity = length * unit_weight;

                }else if (formula === 'coats_area') {

                    quantity = length * height * coats;

                }

                $('#quantity').val(quantity.toFixed(2));

                
            }


        });
    </script>
@endpush
