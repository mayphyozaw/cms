@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">BOQ Cost Details</h4>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            BOQ Cost Details
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
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        COST OF ESTIMATION SHEET (BOQ)
                    </h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('projectmanage.projects.boq-cost-detail.store', [$project->id, $boq->id]) }}"
                        method="POST" id="submit-form" enctype="multipart/form-data">
                        @csrf
                        {{-- ================= PROJECT INFO ================= --}}


                        {{-- ================= ITEMS AND TOTAL ================= --}}
                        <div class="card">
                            <div class="card-body">
                                {{-- ================= ITEMS ================= --}}
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="mb-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            No
                                                        </th>
                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Particular
                                                        </th>


                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Title
                                                        </th>


                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Category
                                                        </th>

                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Requirement
                                                        </th>


                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Unit
                                                        </th>

                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Quantity
                                                        </th>

                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Rate
                                                        </th>

                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Amount
                                                        </th>

                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Remarks
                                                        </th>

                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody id="table-body">

                                                </tbody>
                                                <tfoot>
                                                    <tr class="table-success">
                                                        <td colspan="8" class="text-end">
                                                            <strong>Matertial Grand Total</strong>
                                                        </td>
                                                        <td>
                                                            <strong id="material_total">0.00</strong>
                                                        </td>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div class="py-3">
                                                <button type="button" id="add-section" class="btn btn-primary btn-sm">+
                                                    Scope Title
                                                </button>
                                                <button type="button" id="add-item" class="btn btn-success btn-sm">+
                                                    Scope Item
                                                </button>
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
                                    <label class="form-label">
                                        Remark:
                                    </label>
                                    <textarea class="summernote" name="remark"></textarea>
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
    {{-- {!! JsValidator::formRequest('App\Http\Requests\BQ\BQWorkCategoryStoreRequest', '#submit-form') !!} --}}
    < <script>
        $(document).ready(function() {
            $('.select2').select2();
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
                        client_id: clientId,
                    },
                    success: function(data) {
                        $('#address').val(data.address);
                        $('#phone').val(data.phone);
                        $('#project_code').val(data.project_code);
                        $('#site_location').val(data.site_location);
                        $('#building_area').val(data.building_area);
                        $('#job_scope').val(data.job_scope);
                        $('#storeys').val(data.storeys);
                        $('#client_type').val(data.client_type);
                    },
                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
            });

            $(document).on('change', '.boq_quantity_detail_id', function() {

                let boqQtyDetailId = $(this).val();
                let currentRow = $(this).closest('tr');

                $.ajax({
                    url: "{{ route('projectmanage.get.material.requirements.by.boq') }}",
                    type: "GET",
                    data: {
                        boq_quantity_detail_id: boqQtyDetailId
                    },
                    success: function(response) {

                        let options =
                            '<option value="">Select Material Requirement</option>';

                        $.each(response, function(index, item) {

                            options += `
                                    <option value="${item.id}">
                                        ${item.material_name}
                                    </option>
                                `;
                        });

                        currentRow.find('.material_requirement_id')
                            .html(options);
                    }
                });
            });



            $(document).on('change', '.boq_category_id, .boq_quantity_detail_id', function() {

                let row = $(this).closest('tr');

                let boqCategoryId = row.find('.boq_category_id').val();
                let boqQuantityDetailId = row.find('.boq_quantity_detail_id').val();

                if (!boqCategoryId || !boqQuantityDetailId) {
                    return;
                }

                $.ajax({
                    url: "{{ route('projectmanage.requirement_by_category') }}",
                    type: 'GET',
                    data: {
                        boq_category_id: boqCategoryId,
                        boq_quantity_detail_id: boqQuantityDetailId
                    },
                    success: function(data) {

                        let requirementSelect = row.find('.requirement_id');

                        requirementSelect.empty();
                        requirementSelect.append(
                            '<option value="">Select Requirement</option>'
                        );

                        $.each(data, function(index, item) {

                            requirementSelect.append(
                                `<option value="${item.id}">
                        ${item.name}
                    </option>`
                            );

                        });
                    }
                });
            });


            // $(document).on('change', '.material_requirement_id', function() {

            //     let materialRequirementId = $(this).val();

            //     let currentRow = $(this).closest('tr');

            //     $.ajax({
            //         url: "{{ route('projectmanage.get.material.requirement') }}",
            //         type: "GET",
            //         data: {
            //             material_requirement_id: materialRequirementId
            //         },
            //         success: function(response) {

            //             console.log(response);

            //             currentRow.find('.boq_category_id')
            //                 .val(response.boq_category_id);

            //             currentRow.find('.boq_category_name')
            //                 .val(response.boq_category_name);

            //             currentRow.find('.variable_asset_id')
            //                 .val(response.variable_asset_id);

            //             currentRow.find('.material_name')
            //                 .val(response.material_name);

            //             currentRow.find('.quantity')
            //                 .val(response.quantity);

            //             currentRow.find('.unit')
            //                 .val(response.unit);

            //             currentRow.find('.unit_rate')
            //                 .val(response.unit_rate);

            //             calculateRowAmount(currentRow);

            //         }
            //     });

            // });



            // ADD ITEM
            let itemRowIndex = $('#table-body tr').length;
            let sectionCount = 0;
            let currentSection = 0;
            let sectionItemCount = {};
            $('#add-section').click(function() {
                sectionCount++;
                currentSection = sectionCount;
                sectionItemCount[currentSection] = 0;
                itemRowIndex++;
                let html = `
                    <tr class="section-row" data-section="${currentSection}">
                        <td>${sectionCount}</td>
                        <td colspan="9">
                            <input type="text" name="rows[${itemRowIndex}][title]" placeholder="Section Title" class="form-control">
                            <input type="hidden" name="rows[${itemRowIndex}][type]" value="section">
                            <input type="hidden" name="rows[${itemRowIndex}][item_no]" value="${sectionCount}">
                        </td>
                        <td>
                            <button type="button" class="remove btn btn-sm btn-danger">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="subtotal-row" data-section="${currentSection}" >
                        <td colspan="8" class="text-end" style="background-color:#c7dae1">
                            <strong>Section Total</strong>
                        </td>

                        <td style="background-color:#c7dae1">
                            <strong class="section-total">0.00</strong>
                        </td>

                        <td colspan="2" style="background-color:#c7dae1"></td>
                    </tr>`;


                let newRow = $(html);


                $('#table-body').append(html);

                refreshNumbering();
            });

            $('#add-item').click(function() {

                sectionItemCount[currentSection]++;
                let itemNo = currentSection + '.' + sectionItemCount[currentSection];
                itemRowIndex++;

                let html = `
                        <tr class="item-row" data-section="${currentSection}">

                            <td>${itemNo}</td>

                            <td colspan="2">
                                <input type="hidden" name="rows[${itemRowIndex}][type]" value="item">
                                <input type="hidden" name="rows[${itemRowIndex}][item_no]" value="${itemNo}">
                            
                                <select name="rows[${itemRowIndex}][boq_quantity_detail_id]" 
                                    class="form-control boq_quantity_detail_id select2">
                                   <option value="">
                                        Select BOQ Qunatity 
                                    </option>

                                    @foreach ($boqQtyDetails as $boqQty)
                                        <option value="{{ $boqQty->id }}"
                                            data-unit="{{ $boqQty->unit }}">
                                            {{ $boqQty->item_no }} - {{ $boqQty->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <select name="rows[${itemRowIndex}][boq_category_id]"
                                    class="form-control boq_category_id select2">
                                    <option value="">Select Category</option>
                                    @foreach ($boqCategories as $boqCategory)
                                        <option value="{{ $boqCategory->id }}">
                                            {{ $boqCategory->name }} 
                                        </option>
                                    @endforeach
                                    
                                </select>
                            </td>

                             <td>

                                <select name="rows[${itemRowIndex}][requirement_id]"
                                        class="form-control requirement_id select2">
                                    <option value="">Select Requirement</option>
                                </select>
                            </td>

                            

                            
                            
                            <td>
                                <input type="text" name="rows[${itemRowIndex}][unit]" class="form-control unit" readonly>
                            </td>

                            <td>
                                <input type="number" name="rows[${itemRowIndex}][quantity]" class="form-control quantity" readonly step="0.001">
                            </td>

                            <td>
                                <input type="number" name="rows[${itemRowIndex}][unit_rate]" class="form-control unit_rate" readonly step="0.001">
                            </td>

                            <td>
                                <input type="number" name="rows[${itemRowIndex}][amount]" class="form-control amount" readonly step="0.001">
                            </td>

                             <td>
                                <input type="text" name="rows[${itemRowIndex}][remark]" class="form-control remark">
                            </td>

                            
                            <td>
                                <button type="button" class="remove btn btn-sm btn-danger">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </td>
                        </tr>`;



                let newRow = $(html);

                $('#table-body')
                    .find(`.subtotal-row[data-section="${currentSection}"]`)
                    .before(newRow);

                newRow.find('.select2').select2({
                    width: '100%'
                });
                refreshNumbering();
            });

            function refreshNumbering() {
                let sectionIndex = 0;
                let itemIndex = 0;
                $('#table-body tr').each(function() {
                    let row = $(this);
                    // SECTION
                    if (row.hasClass('section-row')) {
                        sectionIndex++;
                        itemIndex = 0;

                        row.find('td:first').text(sectionIndex);
                        row.find('input[name*="[item_no]"]').val(sectionIndex);
                    }
                    // ITEM
                    if (row.hasClass('item-row')) {
                        itemIndex++;

                        let itemNo = sectionIndex + '.' + itemIndex;

                        row.find('td:first').text(itemNo);
                        row.find('input[name*="[item_no]"]').val(itemNo);
                    }
                });
                sectionCount = sectionIndex;
                currentSection = sectionIndex;
            }
            // REMOVE ITEM
            $(document).on('click', '.remove', function() {
                let row = $(this).closest('tr');
                if (row.hasClass('section-row')) {
                    let hasItems = false;
                    row.nextAll().each(function() {
                        if ($(this).hasClass('section-row')) {
                            return false;
                        }
                        if ($(this).hasClass('item-row')) {
                            hasItems = true;
                            return false;
                        }
                    });

                    // if (hasItems) {
                    //     alert('Delete items under this section first!');
                    //     return;
                    // }
                }
                row.remove();
                refreshNumbering();
                calculateTotal();
                calculateMaterialTotal();
            });

            //CALCULATE ITEM
            // $(document).on('input', '.unit_rate', function() {
            //     let row = $(this).closest('tr');
            //     let qty = parseFloat(row.find('.quantity').val()) || 0;
            //     let unitRate = parseFloat(row.find('.unit_rate').val()) || 0;


            //     let amount = qty * unitRate;
            //     row.find('.amount').val(amount.toFixed(2));
            //     calculateTotal();
            //     calculateMaterialTotal();

            // });

            $(document).on('input', '.unit_rate', function() {

                calculateRowAmount(
                    $(this).closest('tr')
                );

            });


            function calculateRowAmount(row) {

                let qty = parseFloat(row.find('.quantity').val()) || 0;
                let rate = parseFloat(row.find('.unit_rate').val()) || 0;

                row.find('.amount')
                    .val((qty * rate).toFixed(2));

                calculateTotal();
                calculateMaterialTotal();
            }



            function calculateTotal() {

                let grandTotal = 0;

                $('.subtotal-row').each(function() {

                    let section = $(this).data('section');

                    let subtotal = 0;

                    let rows = $(`.item-row[data-section="${section}"]`);

                    rows.each(function() {

                        subtotal += parseFloat(
                            $(this).find('.amount').val()
                        ) || 0;

                    });

                    $(this)
                        .find('.section-total')
                        .text(subtotal.toFixed(2));

                    grandTotal += subtotal;

                });

                $('#material_total').text(
                    grandTotal.toFixed(2)
                );
            }

            function calculateMaterialTotal() {

                let total = 0;

                $('.amount').each(function() {

                    total += parseFloat($(this).val()) || 0;

                });

                $('#material_total').text(
                    total.toLocaleString(undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    })
                );
            }

        });
    </script>
@endpush
