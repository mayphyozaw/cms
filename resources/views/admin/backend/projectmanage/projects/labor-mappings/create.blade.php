@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Labor Mappings</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Labor Mappings
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

        <div class="row justify-content-center">
            <div class="card border-0">

                <div class="card-body pb-0 pt-0 px-2">

                    <ul class="nav nav-tabs nav-bordered nav-bordered-primary">

                        <li class="nav-item me-3">
                            <a href="{{ route('projectmanage.projects.labor-mappings.index', $project->id) }}"
                                class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.labor-mappings.index') ? 'active' : '' }}">
                                <i class="ti ti-settings-cog me-2"></i>
                                Labor Mappings
                            </a>
                        </li>


                    </ul>

                </div>
            </div>


            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Labor Mappings Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projectmanage.projects.labor-mappings.store', $project->id) }}"
                            method="POST" id="submit-form" enctype="multipart/form-data">
                            @csrf


                            <div class="row mb-3">

                                <label class="col-sm-3 form-label">
                                    Drawing Measurement:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="drawing_measurement_id" class="form-control select2"
                                            id="drawing_measurement_id">
                                            <option value="">Select Drawing Measurement</option>
                                            @foreach ($drawingMeasurements as $drawingMeasurement)
                                                <option value="{{ $drawingMeasurement->id }}">
                                                    {{ $drawingMeasurement->drawing->drawing_name }} @ 
                                                    {{$drawingMeasurement->category->category_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">

                                <label class="col-sm-3 form-label">
                                    Labor Types:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="labor_type_id" id="labor_type_id"
                                            class="form-control select2">
                                            <option value="">Select Labor Type</option>
                                            @foreach ($laborTypes as $laborType)
                                                <option value="{{ $laborType->id }}">
                                                    {{ $laborType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="row mb-3">
                                <label for="form-label fs-14" class="form-label fs-14 col-sm-3">
                                    Unit:
                                </label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="unit" class="form-control select2"
                                            id="unit">
                                            <option value="">Select Unit</option>
                                            <option value='Man-Hour'> Man-Hour</option>
                                            <option value='Man-Day '> Man-Day </option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3" id="coverage_qty_div">
                                <label class="col-sm-3 form-label">
                                    Productivity
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" name="productivity" class="form-control"  step="0.01">
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                                <label for="form-label fs-14" class="form-label fs-14 col-sm-3">
                                    Remark:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea name="remark" class="form-control"></textarea>
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
        $('.select2').select2({
            width: '100%'
        });
    </script>
    <script>
        $(document).ready(function() {
            

            $('#drawing_measurement_id').on('change', function() {

                let drawingMeasurementId = $(this).val();

                $.ajax({
                    url: "{{ route('projectmanage.drawing_measurement_get') }}",
                    type: 'GET',
                    data: {
                        drawing_measurement_id: drawingMeasurementId
                    },
                    success: function(data) {
                       
                    }
                });
            });


        });
    </script>
@endpush

