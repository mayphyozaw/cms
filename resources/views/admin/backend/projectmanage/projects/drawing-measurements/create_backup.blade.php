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



                                <div class="card" hidden>
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

        $(document).ready(function() {
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

            $(document).on('change', '.drawing_id', function() {
                let drawingId = $(this).val();
                let currentRow = $(this).closest('tr');
                $.ajax({
                    url: "{{ route('projectmanage.drawings_get') }}",
                    type: 'GET',
                    data: {
                        drawing_id: drawingId
                    },
                    success: function(data) {
                        currentRow.find('.drawing_type_id').val(data.drawing_type_id).trigger(
                            'change');
                    },
                    error: function() {
                        alert('Unable to fetch drawing data');
                    }
                });
            });


            $(document).on('change', '.category_id', function() {
                let selected = $(this).find(':selected');
                let formula = selected.data('formula') || '';
                let symbol = selected.data('symbol') || '';
                let calFormula = selected.data('cal-formula') || '';
                let unit = selected.data('unit') || '';

                $('#unit').val(unit);


                let itemRow = $(this).closest('tr.item-row');
                itemRow.attr('data-formula', formula);
                itemRow.attr('data-symbol', symbol);
                itemRow.attr('data-unit', unit);


                itemRow.find('.cal_formula').val(calFormula);


                recalculateDetailsForItem(itemRow);
            });

            $('#work_type_id').on('change', function() {
                let workTypeId = $(this).val();
                $.ajax({
                    url: "{{ route('projectmanage.worktype_get') }}",
                    type: 'GET',
                    data: {
                        work_type_id: workTypeId
                    },
                    success: function(data) {
                        $('#unit').val(data.unit);
                        $('#measurement_type_id').val(data.measurement_type_id).trigger(
                            'change');
                        $('input[name="measurement_type"]').val(data.formula);
                    },
                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
            });



            $(document).on('input',
                '.nos, .length, .width, .height, .unit_weight, .coats, .thickness, .thickness_unit',
                function() {
                    let row = $(this).closest('tr.detail-row');
                    calculateRowQuantity(row);
                    calculateTotal();
                });

            function findItemRowFor(detailRow) {

                return detailRow.prevAll('tr.item-row').first();
            }

            function calculateRowQuantity(row) {
                if (!row || !row.length) return;

                let itemRow = findItemRowFor(row);
                let formula = itemRow.attr('data-formula') || '';
                let unit = itemRow.attr('data-unit') || '';


                let nos = parseFloat(row.find('.nos').val()) || 0;
                let length = parseFloat(row.find('.length').val()) || 0;
                let width = parseFloat(row.find('.width').val()) || 0;
                let height = parseFloat(row.find('.height').val()) || 0;
                let coats = parseFloat(row.find('.coats').val()) || 0;
                let unit_weight = parseFloat(row.find('.unit_weight').val()) || 0;


                let thicknessInput = parseFloat(row.find('.thickness').val()) || 0;
                let thicknessUnit = row.find('.thickness_unit').val() || 'ft';
                let thickness = thicknessUnit === 'inch' ? thicknessInput / 12 : thicknessInput;

                let quantity = 0;

                switch (formula) {
                    case 'volume':
                        quantity = length * width * height;
                        break;
                    case 'excavation_volume':
                    case 'pcc_1:3:6':
                    case 'rcc_footing':
                    case 'rcc_column':
                        quantity = nos * length * width * height;
                        break;
                    case 'area':
                    case 'screed_area':
                    case 'concrete_slab_area':
                    case 'mortar_bed_area':
                        quantity = length * width;
                        break;
                    case 'wall_area':
                        quantity = length * height;
                        break;
                    case 'painting_area':
                    case 'plaster_area':
                    case 'brick_wall_area':
                        quantity = 2 * (length + width) * height;
                        break;
                    case 'linear':
                        quantity = length;
                        break;
                    case 'weight':
                        quantity = length * unit_weight;
                        break;
                    case 'coats_area':
                        quantity = length * height * coats;
                        break;
                    case 'plaster_volume':
                        quantity = (2 * (length + width) * height) * thickness;
                        break;
                    case 'concrete_slab_volume':
                        quantity = length * width * thickness;
                        break;
                    default:
                        quantity = 0;
                }


                if (!['excavation_volume', 'pcc_1:3:6', 'rcc_footing', 'rcc_column'].includes(formula) && nos > 1) {
                    quantity = quantity * nos;
                }


                row.find('.total').val(quantity.toFixed(2));
                row.find('.unit-display').val(unit);
            }

            function recalculateDetailsForItem(itemRow) {
                let next = itemRow.next();
                while (next.length && !next.hasClass('section-row') && !next.hasClass('item-row')) {
                    if (next.hasClass('detail-row')) {
                        calculateRowQuantity(next);
                    }
                    next = next.next();
                }
                calculateTotal();
            }

            let itemRowIndex = $('#table-body tr').length;
            let sectionCount = 0;
            let currentSection = 0;
            let sectionItemCount = {};
            let sectionItemDetailCount = {};

            $('#add-category').click(function() {
                sectionCount++;
                currentSection = sectionCount;
                sectionItemCount[currentSection] = 0;
                sectionItemDetailCount[currentSection] = 0;
                itemRowIndex++;
                let html = `
                    <tr class="section-row">
                        <td>${sectionCount}</td>
                        <td>
                            <select name="drawing_id[]" class="form-control select2 drawing_id">
                                <option value="">Select Drawing</option>
                                @foreach ($drawings as $drawing)
                                    <option value="{{ $drawing->id }}">{{ $drawing->drawing_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td colspan="11">
                            <select name="drawing_type_id[]" class="form-control select2 drawing_type_id">
                                <option value="">Select Drawing Type</option>
                                @foreach ($drawing_types as $drawing_type)
                                    <option value="{{ $drawing_type->id }}">{{ $drawing_type->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button type="button" class="remove btn btn-sm btn-danger">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>`;

                $('#table-body').append(html);
                $('.select2').select2();
                refreshNumbering();
            });

            $('#add-description').click(function() {
                sectionItemCount[currentSection]++;
                let itemNo = currentSection + '.' + sectionItemCount[currentSection];
                itemRowIndex++;

                let html = `
                        <tr class="item-row" data-formula="" data-unit="">
                            <td>${itemNo}</td>
                            <td>
                                <select name="measurement_categories_id[]" class="form-control select2 category_id">
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
                            </td>
                            <td colspan="11">
                                <input type="text" class="form-control cal_formula" readonly placeholder="Formula preview">
                            </td>
                            <td>
                                <button type="button" class="remove btn btn-sm btn-danger">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </td>
                        </tr>`;

                $('#table-body').append(html);
                $('.select2').select2();
                refreshNumbering();
            });

            $('#add-detail').click(function() {
                if (currentSection === 0 || sectionItemCount[currentSection] === 0) {
                    alert('Please add a Category and Description first.');
                    return;
                }
                sectionItemDetailCount[currentSection]++;
                let detailNo = currentSection + '.' + sectionItemCount[currentSection] + '.' +
                    sectionItemDetailCount[currentSection];
                itemRowIndex++;

                let html = `
                        <tr class="detail-row">
                            <td>${detailNo}</td>
                            <td colspan="2">
                                <input type="text" name="rows[${itemRowIndex}][title]" class="form-control">
                                <input type="hidden" name="rows[${itemRowIndex}][detail_no]" value="${detailNo}">
                            </td>
                            <td><input type="text" name="rows[${itemRowIndex}][nos]" class="form-control nos" value="1"></td>
                            <td><input type="number" step="0.001" name="rows[${itemRowIndex}][length]" class="form-control length"></td>
                            <td><input type="number" step="0.001" name="rows[${itemRowIndex}][width]" class="form-control width"></td>
                            <td><input type="number" step="0.001" name="rows[${itemRowIndex}][height]" class="form-control height"></td>
                            <td><input type="number" step="0.001" name="rows[${itemRowIndex}][thickness]" class="form-control thickness"></td>
                            <td>
                                <select name="rows[${itemRowIndex}][thickness_unit]" class="form-control thickness_unit">
                                    <option value="ft">ft</option>
                                    <option value="inch">inch</option>
                                </select>
                            </td>
                            <td><input type="number" step="0.001" name="rows[${itemRowIndex}][unit_weight]" class="form-control unit_weight"></td>
                            <td><input type="number" step="0.01" name="rows[${itemRowIndex}][coats]" class="form-control coats"></td>
                            <td><input type="text" name="rows[${itemRowIndex}][unit]" class="form-control unit-display" readonly></td>
                            <td><input type="number"  step="0.001" name="rows[${itemRowIndex}][deduction]"class="form-control deduction"value="0"></td>

                            <td><input type="text" name="rows[${itemRowIndex}][quantity]" class="form-control  text-end total" readonly value="0.00"></td>
                            <td>
                                <button type="button" class="remove btn btn-sm btn-danger">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </td>
                        </tr>`;

                $('#table-body').append(html);
                refreshNumbering();
            });

            function refreshNumbering() {
                let sectionIndex = 0;
                let itemIndex = 0;
                let detailIndex = 0;
                $('#table-body tr').each(function() {
                    let row = $(this);
                    if (row.hasClass('section-row')) {
                        sectionIndex++;
                        itemIndex = 0;
                        detailIndex = 0;
                        row.find('td:first').text(sectionIndex);
                    }
                    if (row.hasClass('item-row')) {
                        itemIndex++;
                        let itemNo = sectionIndex + '.' + itemIndex;
                        row.find('td:first').text(itemNo);
                    }
                    if (row.hasClass('detail-row')) {
                        detailIndex++;
                        let detailNo = sectionIndex + '.' + itemIndex + '.' + detailIndex;
                        row.find('td:first').text(detailNo);
                        row.find('input[name*="[detail_no]"]').val(detailNo);
                    }
                });
                sectionCount = sectionIndex;
                currentSection = sectionIndex;
            }

            $(document).on('click', '.remove', function() {
                let row = $(this).closest('tr');
                row.remove();
                refreshNumbering();
                calculateTotal();
            });


            function calculateTotal() {
                let total_qty = 0;
                let unit = $('.category_id option:selected').first().data('unit') || '';
                $('.total').each(function() {
                    total_qty += parseFloat($(this).val()) || 0;
                });
                $('#subtotalDisplay').text(total_qty.toFixed(2));
                $('#total_qty').val(total_qty.toFixed(2));
                 $('#unit').val(unit);
            }
        });
    </script>
@endpush
