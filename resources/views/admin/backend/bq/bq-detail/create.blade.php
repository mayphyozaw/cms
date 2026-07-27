@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">
                BOQ Details
            </h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Create BOQ Details
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row justify-content-center">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        BOQ Details Information
                    </h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('projectmanage.projects.boq-detail.store', [$project->id, $boq->id]) }}"
                        method="POST" id="submit-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Work Scope
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="work_scope_id" id="work_scope_id" class="form-control select2">
                                            <option value="">
                                                Select Work Scope
                                            </option>

                                            @foreach ($workScopes as $workscope)
                                                <option value="{{ $workscope->id }}">
                                                    {{ $workscope->title }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    BQ Work Types
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="work_type" id="boq_work_type" class="form-control">
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    BQ Work Category
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="boq_work_category_id" id="boq_work_category_id"
                                            class="form-control select2">
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Drawing Measurement
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="drawing_measurement_id" id="drawing_measurement_id"
                                            class="form-control select2">
                                            @foreach ($drawingMeasurements as $drawingMeasurement)
                                                <option value="{{ $drawingMeasurement->id }}">
                                                    {{ $drawingMeasurement->category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Item Name
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" name="item_name" id="item_name" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Unit
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" name="unit" id="unit" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Quantity
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" name="quantity" id="quantity" class="form-control">
                                    </div>
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
    {!! JsValidator::formRequest('App\Http\Requests\BQ\BQWorkCategoryStoreRequest', '#submit-form') !!}


    <script>
        $(document).ready(function() {
            $('#work_scope_id').on('change', function() {

                let workScopeId = $(this).val();

                $.ajax({
                    url: "{{ route('projectmanage.get.boq.category') }}",
                    type: "GET",
                    data: {
                        work_scope_id: workScopeId
                    },
                    success: function(response) {

                        $('#boq_work_type').html(
                            `<option value="${response[0].boq_work_types}">
                                ${response[0].boq_work_types}
                            </option>`
                        );

                        let options = '';

                        response.forEach(item => {
                            options += `<option value="${item.id}">
                                        ${item.category_name}
                                        </option>`;
                        });

                        $('#boq_work_category_id').html(options);

                    }
                });

            });


            $('#drawing_measurement_id').on('change', function() {
                let drawingMeasurementId = $(this).val();
                $.ajax({
                    url: "{{route('projectmanage.get.drawing.measurement.detail')}}",
                    type: 'GET',
                    data: {
                        drawing_measurement_id: drawingMeasurementId
                    },
                    success: function(data) {
                        $('#item_name').val(data.item_name);
                        $('#unit').val(data.unit);
                        $('#quantity').val(data.quantity);
                        
                    },
                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
                
            });
        });
    </script>
@endpush
