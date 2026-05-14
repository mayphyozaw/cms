@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Drawings</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="#">Project</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Drawing Measurements
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card border-0 rounded-0">
                    <div class="card-header">
                        <h5 class="card-title">Drawing Measurement Information</h5>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ route('projectmanage.projects.drawing-measurements.update', [$project->id, $drawing_measurement->id]) }}"
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

                                <div class="col-12 col-lg-6 mb-3">
                                    <label class="form-label">
                                        Drawing: <span style="color:red;">*</span>
                                    </label>

                                    <select name="drawing_id" id="drawing_id" class="form-control form-select">
                                        <option value="">Select Drawing</option>

                                        @foreach ($drawings as $drawing)
                                            <option value="{{ $drawing->id }}"
                                                {{ $drawing_measurement->drawing_id == $drawing->id ? 'selected' : '' }}>
                                                {{ $drawing->drawing_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label class="form-label">
                                        Drawing Type: <span style="color:red;">*</span>
                                    </label>
                                    <select name="drawing_type_id" id="drawing_type_id" class="form-control form-select">
                                        <option value="">Select Drawing Type</option>

                                        @foreach ($drawing_types as $drawing_type)
                                            <option value="{{ $drawing_type->id }}"
                                                {{ $drawing_measurement->drawing->drawing_type_id == $drawing_type->id ? 'selected' : '' }}>
                                                {{ $drawing_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label class="form-label">
                                        Work Type: <span style="color:red;">*</span>
                                    </label>
                                    <select name="work_type_id" id="work_type_id" class="form-control form-select">
                                        <option value="">Select Work Type</option>

                                        @foreach ($work_types as $work_type)
                                            <option value="{{ $work_type->id }}"
                                                {{ $drawing_measurement->work_type_id == $work_type->id ? 'selected' : '' }}>
                                                {{ $work_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label class="form-label">
                                        Unit: <span style="color:red;">*</span>
                                    </label>
                                    <select name="unit" id="unit" class="form-control form-select">

                                        <option value="">Select Unit</option>
                                        <option value="m3" {{ $drawing_measurement->unit == 'm3' ? 'selected' : '' }}>
                                            m&sup3;
                                        </option>
                                        <option value="m2" {{ $drawing_measurement->unit == 'm2' ? 'selected' : '' }}>
                                            m&sup2;
                                        </option>
                                        <option value="m" {{ $drawing_measurement->unit == 'm' ? 'selected' : '' }}>
                                            m
                                        </option>
                                        <option value="kg" {{ $drawing_measurement->unit == 'kg' ? 'selected' : '' }}>
                                            kg
                                        </option>
                                    </select>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label class="form-label">
                                        Measurement Type: <span style="color:red;">*</span>
                                    </label>
                                    <select name="measurement_type_id" id="measurement_type_id" class="form-select">
                                        <option value="">Select Measurement Type</option>
                                        @foreach ($measurement_types as $measurement_type)
                                            <option value="{{ $measurement_type->id }}"
                                                {{ $drawing_measurement->measurement_type_id == $measurement_type->id ? 'selected' : '' }}>
                                                {{ $measurement_type->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-12 col-lg-3 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Formula:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="measurement_type" id="formula" class="form-control"
                                            value="{{ optional($drawing_measurement->measurementType)->formula }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Length:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="length" class="form-control length"
                                            value="{{ $drawing_measurement->length }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Width:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="width" class="form-control width"
                                            value="{{ $drawing_measurement->width }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Height:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="height" class="form-control height"
                                            value="{{ $drawing_measurement->height }}">
                                    </div>
                                </div>



                                <div class="col-12 col-lg-4 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Item Qty:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="qty" class="form-control qty"
                                            value="{{ $drawing_measurement->qty }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Unit Weight:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="unit_weight" class="form-control unit_weight"
                                            value="{{ $drawing_measurement->unit_weight }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Coats:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="coats" class="form-control coats"
                                            value="{{ $drawing_measurement->coats }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Quantity:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="quantity" id="quantity" class="form-control"
                                            value="{{ $drawing_measurement->quantity }}">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-12 mb-3">
                                    <label class="form-label">
                                        Remark:
                                    </label>
                                    <textarea name="remark" class="form-control">
                                         {{ $drawing_measurement->remark }}
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

    </div>

    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            let selectedWorkType = $('#work_type_id').val();

            if (selectedWorkType) {

                $.ajax({
                    url: "{{ route('projectmanage.worktype_get') }}",
                    type: 'GET',
                    data: {
                        work_type_id: selectedWorkType,
                    },

                    success: function(data) {

                        $('#unit').val(data.unit);

                        $('#measurement_type_id')
                            .val(data.measurement_type_id);

                        $('#formula').val(data.formula);
                    }
                });

            }

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


            document.addEventListener("input", function(e) {

                if (
                    e.target.classList.contains("length") ||
                    e.target.classList.contains("width") ||
                    e.target.classList.contains("height")
                ) {

                    let length =
                        parseFloat(document.querySelector(".length").value) || 0;

                    let width =
                        parseFloat(document.querySelector(".width").value) || 0;

                    let height =
                        parseFloat(document.querySelector(".height").value) || 0;

                    let quantity = length * width * height;

                    $('#quantity').val(quantity);
                }
            });


        });
    </script>
@endpush
