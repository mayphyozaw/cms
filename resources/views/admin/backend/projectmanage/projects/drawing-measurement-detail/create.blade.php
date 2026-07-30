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
                        {{ $project->client->building_area }} Sq.ft
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

                        {{-- <li class="nav-item me-3">
                            <a href="{{ route('projectmanage.projects.drawing-measurement-detail.index', $project->id) }}"
                                class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.drawing-measurement-detail.index') ? 'active' : '' }}">
                                <i class="ti ti-device-laptop me-2"></i>
                                Details
                            </a>
                        </li> --}}

                    </ul>

                </div>
            </div>

            <div class="card" hidden>
                <div class="card-body">
                    {{-- {{ route('projectmanage.projects.drawing-measurement-deduction.store', $project) }} --}}
                    <form action="" method="POST" id="submit-form">
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
                        <form action="{{ route('projectmanage.projects.drawing-measurement-detail.store', [$project->id, $drawingMeasurement->id]) }}"
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
                                        <input type="text" name="drawing_id" class="form-control"
                                            value="{{ $drawingMeasurement->drawing?->drawing_name }}" readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Drawing Type:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="drawing_type_id" class="form-control"
                                            value="{{ $drawingMeasurement->drawing?->drawingType?->name }}" readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Measurement Category:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="category_id" class="form-control"
                                            value="{{ $drawingMeasurement->category?->category_name }}" readonly>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Formulas:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="category_id" class="form-control"
                                            value="{{ $drawingMeasurement->category?->formulas }}" readonly>
                                        <input type="hidden" id="formula_type"
                                            value="{{ $drawingMeasurement->category?->formula_types }}">
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
                                                            <tr class="text-center">
                                                                <th style="background-color: #9dd2e7;">
                                                                    No
                                                                </th>

                                                                <th style="background-color: #9dd2e7;width:250px;">
                                                                    Description</th>
                                                                <th class="col-nos"
                                                                    style="background-color: #9dd2e7;width:100px;">
                                                                    Nos
                                                                </th>
                                                                <th class="col-length"
                                                                    style="background-color: #9dd2e7;width:100px;">
                                                                    Length
                                                                </th>
                                                                <th class="col-width"
                                                                    style="background-color: #9dd2e7;width:100px;">
                                                                    Width
                                                                </th>
                                                                <th class="col-height"
                                                                    style="background-color: #9dd2e7;width:100px;">
                                                                    Height
                                                                </th>
                                                                <th class="col-thickness"
                                                                    style="background-color: #9dd2e7;width:100px;">
                                                                    Thickness
                                                                </th>
                                                                <th class=""
                                                                    style="background-color: #9dd2e7;width:100px;">
                                                                    Thickness Unit
                                                                </th>

                                                                <th class="col-unit-weight"
                                                                    style="background-color: #9dd2e7;width:100px;">
                                                                    Unit Weight
                                                                </th>
                                                                <th class="col-coats"
                                                                    style="background-color: #9dd2e7;width:100px;">
                                                                    Coats
                                                                </th>
                                                                <th class="col-unit"
                                                                    style="background-color: #9dd2e7;width:100px;">
                                                                    Unit
                                                                </th>
                                                                <th class="col-deduction"
                                                                    style="background-color: #9dd2e7;width:100px;">
                                                                    Deduction
                                                                </th>
                                                                <th style="background-color: #9dd2e7;width:100px;">
                                                                    Quantity
                                                                </th>
                                                                <th style="background-color: #9dd2e7;width:100px;">
                                                                    Action
                                                                </th>
                                                            </tr>

                                                        </thead>
                                                        <tbody id="table-body"></tbody>
                                                    </table>
                                                    <div class="py-3">
                                                        <button type="button" id="add-detail"
                                                            class="btn btn-info btn-sm">+
                                                            Add Row
                                                        </button>
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
                                                                        <td class="py-3 text-end bg-light fw-bold" id="subtotalDisplay"
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

                                        {{-- <style>
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
                                        </style> --}}

                                        <div class="col-md-12 mt-2">
                                            <label class="form-label">Remark:</label>
                                            <textarea class="summernote form-control" name="notes"></textarea>
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

        $(document).ready(function() {

            let formula = $('#formula_type').val();
            toggleColumns(formula);
            calculateTotal();

            $('.summernote').summernote({
                placeholder: 'Write Remark or Specifications:',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

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
                        $('#site_location').val(data.site_location);
                        $('#building_area').val(data.building_area);
                        $('#construction_type').val(data.construction_type);
                        $('#job_scope').val(data.job_scope);
                        $('#storeys').val(data.storeys);
                    },
                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
            });

            let itemRow = $('#table-body tr').length;
            let itemCount = 0;
            let currentItem = 0;
            $('#add-detail').on('click', function() {

                itemCount++;
                itemRow++;
                let row = `
                    <tr class="detail-row">
                        <td>${itemCount}</td>
                        
                        <td>
                          <input type="text" name="title[]" class="form-control">
                          
                        </td>

                        <td class="col-nos">
                            <input type="number" name="nos[]" class="form-control nos" value="1">
                        </td>

                        <td class="col-length">
                            <input type="number" name="length[]" class="form-control length" value="1" step="0.001">
                        </td>

                        <td class="col-width">
                            <input type="number" name="width[]" class="form-control width" value="1" step="0.001">
                        </td>

                        <td class="col-height">
                            <input type="number" name="height[]" class="form-control height" value="1" step="0.001">
                        </td>

                        <td class="col-thickness">
                            <input type="number" name="thickness[]" class="form-control thickness" value="1" step="0.001">
                        </td>
                        
                        <td>
                            <select name="thickness_unit[]" class="form-control thickness_unit">
                                <option value="ft">ft</option>
                                <option value="inch">inch</option>
                            </select>
                        </td>

                        <td class="col-unit-weight">
                            <input type="number" name="unit_weight[]" class="form-control unit_weight" value="1">
                        </td>

                        <td class="col-coats">
                            <input type="number" name="coats[]" class="form-control coats" value="1">
                        </td>


                        <td class="col-unit">
                            <input type="text" name="unit[]" class="form-control unit">
                        </td>

                        <td>
                            <input type="number"  step="0.001" name="deduction[]" class="form-control deduction"value="0">
                        </td>

                        <td>
                            <input class="form-control text-end bg-light fw-bold total" type="text" name="quantity[]" readonly value="0.00">
                        </td>

                        <td>
                            <button class="btn btn-danger btn-sm removeRow" type="button">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;

                $('#table-body').append(row);
                let newRow = $('#table-body tr:last');
                calculateTotal();
                refreshNumbering();
                toggleColumns(formula);

            });

            $(document).on('input change',
                '.nos, .length, .width, .height, .unit_weight, .coats, .thickness, .thickness_unit',
                function() {


                    let row = $(this).closest('tr');

                    let nos = parseFloat(row.find('.nos').val()) || 0;
                    let length = parseFloat(row.find('.length').val()) || 0;
                    let width = parseFloat(row.find('.width').val()) || 0;
                    let height = parseFloat(row.find('.height').val()) || 0;

                    calculateTotal();
                    calculateRowQuantity($(this).closest('tr'));

                });


            function findItemRowFor(detailRow) {

                return detailRow.prevAll('tr.detail-row').first();
            }



            function calculateRowQuantity(row) {

                let formula = $('#formula_type').val();

                let nos = parseFloat(row.find('.nos').val()) || 0;
                let length = parseFloat(row.find('.length').val()) || 0;
                let width = parseFloat(row.find('.width').val()) || 0;
                let height = parseFloat(row.find('.height').val()) || 0;
                let thickness = parseFloat(row.find('.thickness').val()) || 0;
                let unitWeight = parseFloat(row.find('.unit_weight').val()) || 0;
                let coats = parseFloat(row.find('.coats').val()) || 0;
                let deduction = parseFloat(row.find('.deduction').val()) || 0;

                let quantity = 0;

                switch (formula) {

                    case 'linear':
                        quantity = nos * length;
                        break;

                    case 'area':
                        quantity = nos * length * width;
                        break;

                    case 'wall_area':
                        quantity = nos * length * height;
                        break;
                    
                    case 'plaster_area':
                        quantity = length * height;
                        break;

                    case 'brick_wall_area':
                        quantity = nos * (2 * (length + width) * height);
                        break;
                    
                    case 'rcc_footing':
                        quantity = length * width * height;
                        break;

                    case 'pcc_volume':
                        quantity = nos * length * width * thickness;
                        break;

                    case 'volume':
                        quantity = nos * length * width * height;
                        break;

                    case 'painting_area':
                        quantity = length * height;
                        break;

                    case 'weight':
                        quantity = nos * length * unitWeight;
                        break;

                    default:
                        quantity = 0;
                }
                
                quantity -= deduction;
                row.find('.total').val(quantity.toFixed(2));
            }

            function toggleColumns(formula) {

                $('.col-length, .col-width, .col-height, .col-thickness, .col-unit-weight, .col-coats')
                    .show();
                $('.col-unit')
                    .hide();

                switch (formula) {

                    case 'linear':
                        $('.col-width, .col-height, .col-thickness, .col-unit-weight, .col-coats').hide();
                        break;

                    case 'area':
                        $('.col-height, .col-thickness, .col-unit-weight, .col-coats').hide();
                        break;

                    case 'wall_area':
                        $('.col-width, .col-thickness, .col-unit-weight, .col-coats').hide();
                        break;

                    case 'plaster_area':
                        $('.col-width, .col-thickness, .col-unit-weight, .col-coats').hide();
                        break;

                    case 'brick_wall_area':
                        $('.col-thickness, .col-unit-weight, .col-coats').hide();
                        break;

                    case 'rcc_footing':
                        $('.col-thickness, .col-unit-weight, .col-coats').hide();
                        break;

                    case 'pcc_volume':
                        $('.col-height, .col-unit-weight, .col-coats').hide();
                        break;

                    case 'weight':
                        $('.col-width, .col-height, .col-thickness, .col-coats').hide();
                        break;

                    case 'painting_area':
                         $('.col-width, .col-thickness, .col-unit-weight, .col-coats').hide();
                        break;

                    case 'plaster_volume':
                        $('.col-unit-weight, .col-coats').hide();
                        break;
                }
            }

            function recalculateDetailsForItem(itemRow) {
                let next = itemRow.next();
                while (next.length && !next.hasClass('detail-row') && !next.hasClass('detail-row')) {
                    if (next.hasClass('detail-row')) {
                        calculateRowQuantity(next);
                    }
                    next = next.next();
                }
                calculateTotal();
            }

            function refreshNumbering() {
                let itemIndex = 0;
                $('#table-body tr').each(function() {
                    let row = $(this);
                    if (row.hasClass('detail-row')) {
                        itemIndex++;
                        row.find('td:first').text(itemIndex);
                    }
                });
                itemCount = itemIndex;
                currentItem = itemIndex;
            }

            $(document).on('click', '.removeRow', function() {
                let row = $(this).closest('tr');
                row.remove();
                refreshNumbering();
                calculateTotal();
            });


            function calculateTotal() {
                let total_qty = 0;

                $('.total').each(function() {
                    total_qty += parseFloat($(this).val()) || 0;
                });

                $('#subtotalDisplay').text(total_qty.toFixed(2));
                $('#total_qty').val(total_qty.toFixed(2));

            }


        });
    </script>
@endpush
