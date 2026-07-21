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
            <div class="gap-2 d-flex align-items-center flex-wrap">

                <a href="{{ route('projectmanage.projects.index') }}" class="btn btn-outline-light shadow">
                    <span style="color:black">{{ $project->client->project_code }} @
                        {{ $project->client->name }} - ({{ $project->client->length }} * {{ $project->client->width }}) -
                        {{ $project->client->building_area }} sqft
                    </span>
                </a>

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

                        <li class="nav-item me-3">
                            <a href="" class="nav-link p-2 ">
                                <i class="ti ti-device-laptop me-2"></i>
                                Details
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
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Drawing Name:
                                    </label>
                                    <div class="input-group">
                                        <select name="drawing_id" class="form-control select2" id="drawing_id">
                                            <option value="">Select Drawing</option>
                                            @foreach ($drawings as $drawing)
                                                <option value="{{ $drawing->id }}">{{ $drawing->drawing_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Drawing Type: <span style="color:red;">*</span>
                                    </label>
                                    <select name="drawing_type_id" id="drawing_type_id" class="form-control select2">
                                        <option value="">Select Drawing Type</option>
                                        @foreach ($drawing_types as $drawing_type)
                                            <option value="{{ $drawing_type->id }}">
                                                {{ $drawing_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                 <div class="col-12 col-lg-6 mb-3">
                                    <label class="form-label">
                                        Measurement Category: <span style="color:red;">*</span>
                                    </label>

                                    <select name="measurement_categories_id" id="category_id"
                                        class="form-control select2">
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


                                <div class="col-12 col-lg-6 mb-3">
                                    <label class="form-label">
                                        Formula:
                                    </label>

                                    <input type="text" id="cal_formula" class="form-control"
                                        readonly>
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
@endsection

@push('scripts')
    <script>
        $('.select2').select2({
            width: '100%'
        });

        $(document).ready(function() {
            $('#client_id').on('change', function() {
                let clientId = $(this).val();
                $.ajax({
                    url: "{{ route('projectmanage.clients_get') }}",
                    type: 'GET',
                    data: {
                        client_id: clientId
                    },
                    success: function(data) {
                        $('#address').val(data.address);
                        $('#client_code').val(data.client_code);
                        $('#project_code').val(data.project_code);
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
                        $('#drawing_type_id').val(data.drawing_type_id).trigger(
                            'change');
                    },

                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
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


                // calculateQuantity();
            });

            
    </script>
@endpush
