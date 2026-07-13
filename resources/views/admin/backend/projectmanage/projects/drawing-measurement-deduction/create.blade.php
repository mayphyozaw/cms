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
                    <form
                        action="{{ route('projectmanage.projects.drawing-measurement-deduction.store', [
                            'project' => $project->id,
                            'detail' => $detail->id,
                        ]) }}"
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
                                    Drawing Measurement Description:
                                </label>
                                <input type="hidden" name="drawing_measurement_detail_id" value="{{ $detail->id ?? '' }}">
                                <input type="text" name="drawing_measurement_detail_id" class="form-control"
                                    value="{{ $detail->description }}" readonly disabled>
                            </div>





                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Deductions: <span class="text-danger">*</span></label>
                                    <table class="table table-striped table-bordered dataTable" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th style="width: 30%;background-color: #9dd2e7;">Opening Type</th>
                                                <th style="width: 20%;background-color: #9dd2e7;">Description</th>
                                                <th style="width: 12%;background-color: #9dd2e7;">Width</th>
                                                <th style="width: 12%;background-color: #9dd2e7;">Height</th>
                                                <th style="width: 12%;background-color: #9dd2e7;">Nos</th>
                                                <th style="width: 30%;background-color: #9dd2e7;">Area</th>
                                                <th style="width: 20%;background-color: #9dd2e7;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="deductionTable">
                                            <tr>
                                                <td>
                                                    <select name="opening_type[]" class="form-control select2">
                                                        <option value="">Select Type</option>
                                                        <option value="Door">Door</option>
                                                        <option value="Window">Window</option>
                                                        <option value="Ventilator">Ventilator</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <input name="description[]" class="form-control">
                                                </td>

                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control text-center width-input"
                                                            name="width[]" value="1" min="1"
                                                            style="width:30px;">
                                                    </div>
                                                </td>


                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control text-center height-input"
                                                            name="height[]" value="1" min="1"
                                                            style="width:30px;">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control text-center nos-input"
                                                            name="nos[]" value="1" min="1"
                                                            style="width:30px;">
                                                    </div>
                                                </td>

                                                <td class="text-end">
                                                    <span class="totalArea" name="area">
                                                        0.00
                                                    </span>
                                                    <input type="hidden" name="area[]" class="area-input">
                                                </td>

                                                <td class="text-center">
                                                    <button class="btn btn-danger btn-sm removeRow" type="button">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="py-3">
                                        <button class="btn btn-info btn-sm" id="addRowBtn" type="button">
                                            Add Row
                                        </button>

                                    </div>

                                </div>
                            </div>

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
                                                            <input type="hidden" id="total_area" name="total_area"
                                                                value="0">
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" hidden>
                                <div class="col-md-6 ms-auto">
                                    <div class="card">
                                        <div class="card-body pt-7 pb-2">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>

                                                        <tr>
                                                            <td class="py-3">Subtotal</td>
                                                            <td class="py-3" id="total_area" name="total_area"
                                                                style="text-align:end">

                                                            </td>
                                                            <input type="hidden" name="total_area">
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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


            document.getElementById("addRowBtn").addEventListener("click", function() {
                const itemTable = document.getElementById("deductionTable");

                let row = `
                    <tr>
                             <td>
                                <select name="opening_type[]" class="form-control select2">
                                    <option value="">Select Type</option>
                                    <option>Door</option>
                                    <option>Window</option>
                                    <option>Ventilator</option>
                                </select>
                            </td>

                            <td>
                                <input name="description[]" class="form-control">
                            </td>

                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control text-center width-input"
                                        name="width[]" value="1" min="1"
                                        style="width:30px;">
                                </div>
                            </td>


                            <td>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control text-center height-input" name="height[]"
                                        value="1" min="1" style="width:30px;">
                                </div>
                            </td>

                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control text-center nos-input"
                                        name="nos[]" value="1" min="1"
                                        style="width:30px;">
                                </div>
                            </td>

                            <td class="text-end">
                                <span class="totalArea" name="area[]">
                                    0.00
                                </span>
                                 <input type="hidden" name="area[]" class="area-input">
                            </td>

                            <td>
                                <button class="btn btn-danger btn-sm removeRow" type="button">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </td>
                        </tr>
                `;

                itemTable.insertAdjacentHTML("beforeend", row);
                calculateArea();
                calculateTotal();

            });


            $(document).on('input', '.nos-input, .width-input, .height-input', function() {
                calculateArea();
            });

            function calculateArea() {

                $('#deductionTable tr').each(function() {

                    let width = parseFloat($(this).find('.width-input').val()) || 0;
                    let height = parseFloat($(this).find('.height-input').val()) || 0;
                    let nos = parseFloat($(this).find('.nos-input').val()) || 0;

                    let area = width * height * nos;

                    $(this).find('.totalArea').text(area.toFixed(2));
                    $(this).find('.area-input').val(area.toFixed(2));
                });

                calculateTotal();
            }

            document.addEventListener("click", function(e) {
                if (e.target.closest(".removeRow")) {
                    let row = e.target.closest("tr");
                    if (document.querySelectorAll("#deductionTable tr").length > 1) {
                        row.remove();
                        calculateArea();
                    }
                }

            });


            function calculateTotal() {

                let total_area = 0;

                $('.totalArea').each(function() {

                    total_area += parseFloat($(this).text()) || 0;

                });

                $('#subtotalDisplay').text(total_area.toFixed(2));
                $('#total_area').val(total_area.toFixed(2));
            }


        });
    </script>
@endpush
