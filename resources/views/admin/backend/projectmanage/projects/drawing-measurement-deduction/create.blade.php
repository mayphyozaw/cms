@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Drawing Measurements</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Deduction
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

                    </ul>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                   {{-- {{ route('projectmanage.projects.drawing-measurement-deduction.store', $project) }} --}}
                    <form action=""
                        method="POST" id="submit-form">
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

                            <div class="col-12 col-lg-6 mb-3" hidden>
                                <label class="form-label">
                                    Drawing Measurement Detail:
                                </label>
                                <input type="hidden" name="drawing_measurement_detail_id" value="{{ $detail->id ?? '' }}">
                            </div>

                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label">
                                    Opening Type: <span style="color:red;">*</span>
                                </label>


                                <select name="opening_type" class="form-control select2">
                                    <option value="">Select Type</option>
                                    <option>Door</option>
                                    <option>Window</option>
                                    <option>Ventilator</option>
                                </select>
                            </div>

                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label">
                                    Description:
                                </label>

                                <input type="text" name="description" class="form-control">
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
                                    Nos:
                                </label>

                                <div class="col-sm-5">
                                    <input type="text" name="nos" class="form-control nos"
                                        @error('nos') is-invalid @enderror placeholder="Enter Nos" required value="0">
                                </div>
                            </div>




                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Area:
                                </label>

                                <div class="col-sm-3">
                                    <input type="text" name="area" id="area" class="form-control area"
                                        @error('area') is-invalid @enderror readonly>
                                </div>
                                <div class="col-sm-2">
                                    sqft
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Remark:
                                </label>

                                <div class="col-sm-5">
                                    <textarea name="remarks" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>

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
    </script>
    <script>
        $(document).ready(function() {


            $('.nos,  .width, .height').on('input', function() {

                calculateArea();

            });

            function calculateArea() {

                let width = parseFloat($('.width').val()) || 0;
                let height = parseFloat($('.height').val()) || 0;
                let nos = parseFloat($('.nos').val()) || 0;

                let area = 0;

                area = width * height * nos;

                $('#area').val(area.toFixed(2));
            }




        });
    </script>
@endpush
