@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Site Measurements</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Site Measurements
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
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
            
            <div class="col-xl-9 col-lg-12">
                <div class="card border-0 rounded-0">
                    <div class="card-header">
                        <h5 class="card-title">Site Measurement Information</h5>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ route('projectmanage.projects.site-measurements.update', [$project->id, $site_measurement->id]) }}"
                            method="POST" id="submit-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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

                                <div class="col-12 col-lg-3 mb-3" hidden>
                                    <label class="form-label">
                                        Drawing Name:
                                    </label>
                                    <input type="hidden" id="drawing_id" name="drawing_id" class="form-control"
                                        value="{{ $site_measurement->drawing_id }}" readonly>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label class="form-label">
                                        Drawing Name: <span style="color:red;">*</span>
                                    </label>

                                    <select name="drawing_measurement_id" id="drawing_measurement_id" class="form-select">
                                        <option value="">Select Drawing Measurement</option>

                                        @foreach ($drawingMeasurements as $drawingMeasurement)
                                            <option value="{{ $drawingMeasurement->id }}"
                                                data-category-id="{{ $drawingMeasurement->measurement_categories_id }}"
                                                data-drawing-id="{{ $drawingMeasurement->drawing_id }}"
                                                data-length="{{ $drawingMeasurement->length }}"
                                                data-width="{{ $drawingMeasurement->width }}"
                                                data-height="{{ $drawingMeasurement->height }}"
                                                data-unit-weight="{{ $drawingMeasurement->unit_weight }}"
                                                data-quantity="{{ $drawingMeasurement->quantity }}"
                                                data-unit="{{ $drawingMeasurement->unit }}"
                                                data-formula="{{ $drawingMeasurement->measurementCategory?->formula_types }}"
                                                data-symbol="{{ $drawingMeasurement->measurementCategory?->symbol }}"
                                                data-cal-formula="{{ $drawingMeasurement->measurementCategory?->formulas }}"
                                                {{ $site_measurement->drawing_measurement_id == $drawingMeasurement->id ? 'selected' : '' }}>

                                                {{ $drawingMeasurement->drawing?->drawing_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label class="form-label">
                                        Measurement Categories:
                                    </label>

                                    <select name="category_id" id="category_id" class="form-select">
                                        <option value="">Select Measurement Category</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $site_measurement->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-lg-3 mb-3" hidden>
                                    <label class="form-label">
                                        Measurement Categories:
                                    </label>

                                    <input type="hidden" id="category_id" name="category_id" class="form-control"
                                        value="{{ $site_measurement->category_id }}" readonly>
                                </div>

                                <div class="col-12 col-lg-3 mb-3" hidden>
                                    <label class="form-label">
                                        Formula Type:
                                    </label>

                                    <input type="text" id="formula_type" class="form-control" readonly>
                                </div>

                                <div class="col-12 col-lg-2 mb-3">
                                    <label class="form-label">
                                        Symbol:
                                    </label>

                                    <input type="text" id="symbol" class="form-control" readonly>
                                </div>
                                <div class="col-12 col-lg-2 mb-3">
                                    <label class="form-label">
                                        Formula:
                                    </label>

                                    <input type="text" id="cal_formula" class="form-control" readonly>
                                </div>

                                <div class="col-md-3 col-lg-2 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Unit:
                                        </label>

                                        <input type="text" name="unit" id="unit" class="form-control"
                                            readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Length:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="length" class="form-control length"
                                            value="{{ $site_measurement->length }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Width:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="width" class="form-control width"
                                            value="{{ $site_measurement->width }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Height:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="height" class="form-control height"
                                            value="{{ $site_measurement->height }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Unit Weight:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="unit_weight" class="form-control unit_weight"
                                            value="{{ $site_measurement->unit_weight }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Quantity:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="quantity" id="quantity" class="form-control"
                                            value="{{ $site_measurement->quantity }}" readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Rate:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="rate" class="form-control rate"
                                            value="{{ $site_measurement->rate }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Total:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="total" id="total" class="form-control"
                                            value="{{ $site_measurement->total }}" readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-12 mb-3">
                                    <label class="form-label">
                                        Remark:
                                    </label>
                                    <textarea name="remarks" class="form-control">
                                        {{ $site_measurement->remarks }}
                                    </textarea>
                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
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


            $('#drawing_measurement_id').on('change', function() {

                let selected = $(this).find(':selected');

                $('#drawing_id').val(
                    selected.data('drawing-id')
                );

                $('#category_id').val(
                    selected.data('category-id')
                );

                let formula = selected.data('formula') || '';
                let symbol = selected.data('symbol') || '';
                let calFormula = selected.data('cal-formula') || '';
                let unit = selected.data('unit') || '';

                $('#formula_type').val(formula);
                $('#symbol').val(symbol);
                $('#cal_formula').val(calFormula);
                $('#unit').val(unit);



                calculateQuantity();
            });

            $('.length, .width, .height, .unit_weight, .rate').on('input', function() {

                calculateQuantity();

            });

            function loadCategoryInfo() {

                let selected = $('#drawing_measurement_id').find(':selected');

                $('#formula_type').val(selected.data('formula') || '');
                $('#symbol').val(selected.data('symbol') || '');
                $('#unit').val(selected.data('unit') || '');
                $('#cal_formula').val(selected.data('cal-formula'));

                calculateQuantity();
            }

            loadCategoryInfo();

            $('#drawing_measurement_id').on('change', function() {
                loadCategoryInfo();
            });

            function calculateQuantity() {

                let length = parseFloat($('.length').val()) || 0;
                let width = parseFloat($('.width').val()) || 0;
                let height = parseFloat($('.height').val()) || 0;
                let unit_weight = parseFloat($('.unit_weight').val()) || 0;
                let rate = parseFloat($('.rate').val()) || 0;

                let formula = $('#formula_type').val();

                let quantity = 0;

                if (formula === 'volume') {

                    quantity = length * width * height;

                } else if (formula === 'area') {

                    quantity = length * width;

                } else if (formula === 'wall_area') {

                    quantity = length * height;

                } else if (formula === 'linear') {

                    quantity = length;

                } else if (formula === 'weight') {

                    quantity = length * unit_weight;

                }

                $('#quantity').val(quantity.toFixed(2));

                let total = quantity * rate;

                $('#total').val(total.toFixed(2));
            }



        });
    </script>
@endpush
