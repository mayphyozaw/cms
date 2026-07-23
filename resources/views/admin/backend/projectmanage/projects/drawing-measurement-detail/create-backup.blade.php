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
                            Detail
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
                            <a href="{{ route('projectmanage.projects.drawing-measurement-detail.index', $project->id) }}"
                                class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.drawing-measurement-detail.index') ? 'active' : '' }}">
                                <i class="ti ti-device-laptop me-2"></i>
                                Details
                            </a>
                        </li>

                    </ul>

                </div>
            </div>

            <div class="card" hidden>
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

                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label">
                                    Description:
                                </label>

                                <input type="text" name="description" class="form-control">
                            </div>

                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label">
                                    Formula Type:
                                </label>

                                <input type="text" name="description" class="form-control">
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

                                <input type="text" name="description" class="form-control"
                                value="{{$drawingMeasurementDetails->drawingMeasurement->drawing->drawing_name }}" readonly>
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



                                <div class="card">
                                    <div class="card-body">
                                        {{-- ================= ITEMS ================= --}}
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="mb-3">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="background-color: #9dd2e7;">
                                                                    No</th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:150px;">Drawing
                                                                    Name</th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:250px;">
                                                                    Particular</th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:100px;">Nos</th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:100px;">Length
                                                                </th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:100px;">Width
                                                                </th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:100px;">Height
                                                                </th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:100px;">Thickness
                                                                </th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:100px;">Thickness
                                                                    Unit</th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:100px;">Unit
                                                                    Weight</th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:100px;">Coats
                                                                </th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:100px;">Unit</th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:100px;">Quantity
                                                                </th>
                                                                <th class="text-center"
                                                                    style="background-color: #9dd2e7;width:100px;">Action
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="table-body"></tbody>
                                                    </table>
                                                    <div class="py-3">
                                                        <button type="button" id="add-category"
                                                            class="btn btn-primary btn-sm">+ Category</button>
                                                        <button type="button" id="add-description"
                                                            class="btn btn-success btn-sm">+ Description</button>
                                                        <button type="button" id="add-detail" class="btn btn-info btn-sm">+
                                                            Detail</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- ================= TOTAL ================= --}}
                                        <div class="row">
                                            <div class="col-md-6 ms-auto">
                                                <div class="card">
                                                    <div class="card-body pt-7 pb-2">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="py-3">Total</td>
                                                                        <td class="py-3" id="subtotalDisplay"
                                                                            style="text-align:end">0.00</td>
                                                                        <input type="hidden" id="total_qty"
                                                                            name="total_qty" value="0">
                                                                        <input type="hidden" id="unit"
                                                                            name="unit" value="0">
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <style>
                                            .proposal-content {
                                                word-wrap: break-word;
                                                line-height: 1.6;
                                            }

                                            .proposal-content ul {
                                                display: block !important;
                                                list-style-type: disc !important;
                                                list-style-position: outside !important;
                                                padding-left: 2.0rem !important;
                                                margin-top: 10px !important;
                                                margin-bottom: 10px !important;
                                            }

                                            .proposal-content li {
                                                display: list-item !important;
                                                list-style-type: disc !important;
                                                margin-bottom: 5px;
                                            }

                                            .proposal-content ol {
                                                display: block !important;
                                                list-style-type: decimal !important;
                                                padding-left: 2.0rem !important;
                                            }
                                        </style>

                                        <div class="col-md-12 mt-2">
                                            <label class="form-label">Remark:</label>
                                            <textarea class="summernote" name="notes"></textarea>
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
