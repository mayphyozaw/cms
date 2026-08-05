@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Equipment Mappings</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Equipment Mappings
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">

                <a href="{{ route('projectmanage.projects.index') }}" class="btn btn-outline-light shadow">
                    <span style="color:black">{{ $project->client->project_code }} @
                        {{ $project->client->name }} - ({{ $project->client->length }} * {{ $project->client->width }}) -
                        {{ $project->client->building_area }} Sq.ft
                    </span>
                </a>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="card border-0">

                <div class="card-body pb-0 pt-0 px-2">

                    <ul class="nav nav-tabs nav-bordered nav-bordered-primary">

                        <li class="nav-item me-3">
                            <a href="{{ route('projectmanage.projects.equipment-mappings.index', $project->id) }}"
                                class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.equipment-mappings.index') ? 'active' : '' }}">
                                <i class="ti ti-settings-cog me-2"></i>
                                Equipment Mappings
                            </a>
                        </li>


                    </ul>

                </div>
            </div>


            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Equipment Mappings Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projectmanage.projects.equipment-mappings.store', $project->id) }}"
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
                                                    {{ $drawingMeasurement->category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="row mb-3">

                                <label class="col-sm-3 form-label">
                                    Equipments:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="equipment_id" id="equipment_id" class="form-control select2">
                                            <option value="">Select Equipment</option>
                                            @foreach ($equipments as $equipment)
                                                <option value="{{ $equipment->id }}">
                                                    {{ $equipment->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Equipment Category:
                                </label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="equipment_category_id" id="equipment_category_id">

                                    <input type="text" id="equipment_category_name" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="form-label fs-14" class="form-label fs-14 col-sm-3">
                                    Unit:
                                </label>

                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="productivity_unit" class="form-control select2" id="productivity_unit">
                                            <option value="">Select Unit</option>
                                            <option value='CFT/Day'> CFT/Day</option>
                                            <option value='CFT/Hour'> CFT/Hour </option>
                                            <option value='M3/Day'> M3/Day </option>
                                            <option value='M3/Hour'> M3/Hour </option>
                                            <option value='SQFT/Day'> SQFT/Day </option>
                                            <option value='SQFT/Hour'> SQFT/Hour </option>
                                            <option value='Ton/Day'> Ton/Day </option>
                                            <option value='Ton/Hour'> Ton/Hour </option>
                                            <option value='Nos/Day'> Nos/Day </option>
                                            <option value='Nos/Hour'> Nos/Hour </option>
                                            <option value='Hour/Day'> Hour/Day </option>
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
                                        <input type="text" name="productivity" class="form-control" step="0.01">
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

            $('#equipment_id').on('change', function() {

                let equipmentId = $(this).val();

                $.ajax({
                    url: "{{ route('projectmanage.equipment_get') }}",
                    type: 'GET',
                    data: {
                        equipment_id: equipmentId
                    },
                    success: function(data) {

                        $('#equipment_category_id')
                            .val(data.equipment_category_id)
                            .trigger('change');

                        $('#equipment_category_name')
                            .val(data.equipment_category_name)
                            .trigger('change');


                    }
                });
            });





        });
    </script>
@endpush

{{-- Concrete Mixer		CFT/Day
Concrete Vibrator		CFT/Day
Excavator		CFT/Day
Tower Crane		Ton/Hour
Generator		Hour/Day --}}

{{-- Productivity_unit
CFT/Day
CFT/Hour
M3/Day
M3/Hour
SQFT/Day
SQFT/Hour
Ton/Day
Ton/Hour
Nos/Day
Nos/Hour --}}