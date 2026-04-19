@extends('layouts.app')
@section('content')
    <div class="content pb-0">

        <div class="mb-4">
            <h4 class="mb-1">Proposal</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Customers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Quotation Proposal</li>
                </ol>
            </nav>
        </div>

        <div class="row justify-content-center">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Project Information</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('clientmanage.quototation-proposal.store') }}" method="POST" id="submit-form"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Subject:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="main_subject"
                                                    id="main_subject">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Quotation Proposal Date:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="proposal_date"
                                                    id="proposal_date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="formBasic">
                                                Work Scope:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="workscope_id" id="workscope_id" class="form-control form-select">
                                                <option value="">Select Work Scope</option>

                                                @foreach ($workscopes as $workscope)
                                                    <option value="{{ $workscope->id }}">
                                                        {{ $workscope->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">
                                                Project Status:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="">-- Select Project Type--</option>
                                                <option value="Requested">Requested</option>
                                                <option value="Accepted">Accepted</option>
                                                <option value="Declined">Declined</option>
                                                <option value="Deleted">Deleted</option>
                                                <option value="Draft">Draft</option>
                                                <option value="Sent">Sent</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">
                                                Customer: </label>
                                            <select name="client_id" id="client_id" class="form-control form-select">
                                                <option value="">Select Customer</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">
                                                        {{ $client->client_code }} - {{ $client->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Project Code:</label>
                                            <div class="input-group">
                                                <span class="input-group-text">P-</span>
                                                <input type="text" class="form-control" name="project_code"
                                                    id="project_code">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Contact Number:</label>
                                            <input type="text" class="form-control" name="phone" id="phone">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Site Location:</label>
                                            <input type="text" class="form-control" name="site_location"
                                                id="site_location">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">
                                                Building Area:
                                            </label>
                                            <input type="text" class="form-control" name="building_area"
                                                id="building_area">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">
                                                Number of Storeys:
                                            </label>
                                            <input type="text" class="form-control" name="storeys" id="storeys">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">
                                                Job Scope:</label>
                                            <select class="form-control" name="job_scope" id="job_scope">
                                                <option value="">-- Select Job Scope Type--</option>
                                                <option value="Structure">Structure</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="Plumbing">Plumbing</option>
                                                <option value="PAE">PAE</option>
                                                <option value="Steel">Steel Structure</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">
                                                Construction Type:</label>
                                            <select class="form-control" name="construction_type" id="construction_type">
                                                <option value="">-- Select Construction Type--</option>
                                                <option value="Residential">Residential</option>
                                                <option value="Commercial">Commercial</option>
                                                <option value="Renovation">Renovation</option>
                                                <option value="PAE">PAE</option>
                                                <option value="RC">RC</option>
                                                <option value="Steel Structure">Steel Structure</option>
                                                <option value="Electrical">Electrical</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-12 mb-3" hidden>
                                        <label class="form-label">Remark:</label>
                                        <textarea name="notes" class="form-control"></textarea>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">

                                        <div class="mb-3">

                                            <table class="table table-bordered">
                                                <thead>

                                                    <tr>
                                                        <th class="text-center" style="background-color: #9dd2e7">No</th>
                                                        <th class="text-center" style="background-color: #9dd2e7">
                                                            Particular</th>
                                                        <th class="text-center" style="background-color: #9dd2e7">Unit
                                                        </th>
                                                        <th class="text-center" style="background-color: #9dd2e7">Qty</th>
                                                        <th class="text-center" style="background-color: #9dd2e7">Price
                                                            (MMK)</th>
                                                        <th class="text-center" style="background-color: #9dd2e7">Total
                                                            (MMK)</th>
                                                        <th class="text-center" style="background-color: #9dd2e7">Remark
                                                        </th>
                                                        <th class="text-center" style="background-color: #9dd2e7">Action
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody id="table-body"></tbody>
                                            </table>

                                            <div class="py-3">
                                                <button type="button" id="add-section" class="btn btn-primary btn-sm">+
                                                    Scope Title</button>
                                                <button type="button" id="add-item" class="btn btn-success btn-sm">+
                                                    Scope Item</button>
                                            </div>
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
                                                                <td class="py-3">Subtotal</td>
                                                                <td class="py-3" id="subtotalDisplay"
                                                                    name="subtotal_amount" style="text-align:end"> 0.00
                                                                    MMK
                                                                </td>
                                                                <input type="hidden" name="subtotal_amount">
                                                            </tr>

                                                            <tr>
                                                                <td class="py-3">
                                                                    <div class="row">
                                                                        <label class="col-sm-7 form-label">Tax :</label>
                                                                        <div class="col-sm-4">
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control"
                                                                                    id="inputTax" name="tax_amount">
                                                                                <div class="input-group-text">
                                                                                    <i class="ti ti-percentage"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td class="py-3" id="taxDisplay"
                                                                    style="text-align:end"> 0.00 MMK</td>
                                                                <input type="hidden" name="tax_amount">
                                                            </tr>

                                                            <tr>
                                                                <td class="py-3">
                                                                    <div class="row">
                                                                        <label class="col-sm-4 form-label">Discount
                                                                            :</label>
                                                                        <div class="col-sm-7">
                                                                            <div class="input-group">
                                                                                <input type="number" class="form-control"
                                                                                    id="inputDiscount" name="discount">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="py-3" id="displayDiscount"
                                                                    style="text-align:end"> 0.00 MMK
                                                                </td>

                                                            </tr>



                                                            <tr>
                                                                <td class="py-3 text-primary">Grand Total</td>
                                                                <td class="py-3 text-primary" id="grandTotal"
                                                                    name="total_amount" style="text-align:end"> 0.00 MMK
                                                                </td>
                                                                <input type="hidden" name="total_amount">
                                                            </tr>


                                                            <tr>
                                                                <td class="py-3 text-primary">Due Amount</td>
                                                                <td class="py-3 text-primary" id="dueAmount"
                                                                    style="text-align:end"> 0.00 MMK
                                                                </td>
                                                                <input type="hidden" name="due_amount">
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
                                    <label class="form-label">Remark: </label>
                                    {{-- <textarea class="form-control" name="remark" rows="3" placeholder="Enter Remark"></textarea> --}}
                                    <textarea id="summernote" name="notes"></textarea>

                                </div>

                            </div>
                        </div>

                        <div>
                            <h5>Payment Terms</h5>
                            <table class="table table-bordered" id="paymentTermsTable">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="background-color: #9dd2e7;width:25%">Name</th>
                                        <th class="text-center" style="background-color: #9dd2e7;width:20%">Percentage
                                            (%)</th>
                                        <th class="text-center" style="background-color: #9dd2e7;">Description</th>
                                        {{-- <th class="text-center" style="background-color: #9dd2e7;width:10%">Amount</th>
                                        <th class="text-center" style="background-color: #9dd2e7;">Payer</th>
                                        <th class="text-center" style="background-color: #9dd2e7;">Receiver</th>
                                        <th class="text-center" style="background-color: #9dd2e7;width:10%">Date</th> --}}
                                        <th class="text-center" style="background-color: #9dd2e7; width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="payment_terms[0][name]" class="form-control"
                                                placeholder="Enter Name">
                                        </td>
                                        <td>
                                            <input type="number" name="payment_terms[0][percentage]"
                                                class="form-control" placeholder="%">
                                        </td>
                                        <td>
                                            <input type="text" name="payment_terms[0][description]"
                                                class="form-control" placeholder="Upon contract signing">
                                        </td>
                                        {{-- <td>
                                            <input type="text" class="form-control amount" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="payment_terms[0][payer]" class="form-control"
                                                placeholder="Enter Payer">
                                        </td>
                                        <td>
                                            <input type="text" name="payment_terms[0][receiver]" class="form-control"
                                                placeholder="Enter Receiver">
                                        </td>
                                        <td>
                                            <input type="date" name="payment_terms[0][date]" class="form-control"
                                                placeholder="Enter Date">
                                        </td> --}}
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm removeRow">X</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary btn-sm" id="addRow">+ Add Row</button>
                        </div>
                        <br>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- {!! JsValidator::formRequest('App\Http\Requests\Project\ProjectStoreRequest', '#submit-form') !!} --}}
    <script>
        $(document).ready(function() {

            $('#summernote').summernote({
                placeholder: 'Write Remark or Specifications:',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'li', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });


            let rowIndex = 1;

            $('#addRow').click(function() {
                let row = `
                        <tr>
                            <td>
                                <input type="text" name="payment_terms[${rowIndex}][name]" class="form-control" placeholder="Enter name">
                            </td>
                            <td>
                                <input type="number" name="payment_terms[${rowIndex}][percentage]" class="form-control" placeholder="%">
                            </td>
                            <td>
                                <input type="text" name="payment_terms[${rowIndex}][description]" class="form-control" placeholder="Description">
                            </td>
                            
                            <td>
                                <button type="button" class="btn btn-danger btn-sm removeRow">X</button>
                            </td>
                        </tr>
                    `;

                $('#paymentTermsTable tbody').append(row);
                rowIndex++;
            });

            $(document).on('click', '.removeRow', function() {
                $(this).closest('tr').remove();
            });

            $(document).on('input', '.percentage', function() {
                let row = $(this).closest('tr');
                let percentage = parseFloat($(this).val()) || 0;

                let amount = (totalAmount / 100) * percentage;

                row.find('.amount').val(amount.toFixed(2));
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
                        $('#construction_type').val(data.construction_type);
                        $('#job_scope').val(data.job_scope);
                        $('#storeys').val(data.storeys);
                        $('#client_type').val(data.client_type);
                    },

                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
            });

            $('#inputDiscount, #inputTax').on('input', function() {
                calculateGrandTotal();
            });


        });

        let sectionCount = 0;
        let rowIndex = 0;
        let currentSection = 0;

        let sectionItemCount = {};

        $('#add-section').click(function() {

            sectionCount++;
            currentSection = sectionCount;
            sectionItemCount[currentSection] = 0;

            rowIndex++;

            let html = `
        <tr class="section-row">
            <td>${sectionCount}</td>
            <td colspan="6">
                <input type="text" name="rows[${rowIndex}][title]" placeholder="Section Title" class="form-control">
                <input type="hidden" name="rows[${rowIndex}][type]" value="section">
                <input type="hidden" name="rows[${rowIndex}][item_no]" value="${sectionCount}">
            </td>
            <td>
                <button type="button" class="remove btn btn-sm btn-danger">
                    <i class="ti ti-trash"></i>
                </button>
            </td>
        </tr>`;

            $('#table-body').append(html);
        });



        $('#add-item').click(function() {

            if (currentSection === 0) {
                alert('Add section first!');
                return;
            }

            // increment only current section item count
            sectionItemCount[currentSection]++;

            let itemNo = currentSection + '.' + sectionItemCount[currentSection];

            rowIndex++;

            let html = `
                <tr class="item-row">
                    <td>${itemNo}</td>

                    <td>
                        <input type="text" name="rows[${rowIndex}][title]" class="form-control">
                        <input type="hidden" name="rows[${rowIndex}][type]" value="item">
                        <input type="hidden" name="rows[${rowIndex}][item_no]" value="${itemNo}">
                    </td>

                    <td><input type="text" name="rows[${rowIndex}][unit]" class="form-control"></td>
                    <td><input type="number" name="rows[${rowIndex}][quantity]" class="form-control qty"></td>
                    <td><input type="number" name="rows[${rowIndex}][price]" class="form-control price"></td>

                    <td class="total">0</td>

                    <td><input type="text" name="rows[${rowIndex}][remark]" class="form-control"></td>

                    <td>
                        <button type="button" class="remove btn btn-sm btn-danger">
                            <i class="ti ti-trash"></i>
                        </button>
                    </td>
                </tr>`;

            $('#table-body').append(html);
        });


        $(document).on('click', '.remove', function() {
            $(this).closest('tr').remove();
            calculateGrandTotal();
        });


        $(document).on('input', '.qty, .price', function() {

            let row = $(this).closest('tr');

            let qty = row.find('.qty').val() || 0;
            let price = row.find('.price').val() || 0;

            let total = qty * price;

            row.find('.total').text(total);

            calculateGrandTotal();
        });


        function calculateGrandTotal() {

            let subtotal = 0;

            $('.total').each(function() {
                subtotal += parseFloat($(this).text()) || 0;
            });

            let discount = parseFloat($('#inputDiscount').val()) || 0;
            let taxPercent = parseFloat($('#inputTax').val()) || 0;

            let taxAmount = (subtotal * taxPercent) / 100;
            let grandTotal = subtotal + taxAmount - discount;


            $('#subtotalDisplay').text(subtotal.toFixed(2) + " MMK");
            $('#taxDisplay').text(taxAmount.toFixed(2) + " MMK");
            $('#displayDiscount').text(discount.toFixed(2) + " MMK");
            $('#grandTotal').text(grandTotal.toFixed(2) + " MMK");
            $('#dueAmount').text(grandTotal.toFixed(2) + " MMK");

            $("input[name='total_amount']").val(grandTotal.toFixed(2));
            $("input[name='tax_amount']").val(taxAmount.toFixed(2));
            $("input[name='due_amount']").val(grandTotal.toFixed(2));

            updateDueAmount();
        }

        function updateSubtotal(row) {
            let qty = row.find('.qty').val() || 0;
            let price = row.find('.price').val() || 0;
            let discount = row.find('.discount').val() || 0;

            // Calculate subtotal after discount
            let subtotal = (price * qty) - discount;

            row.querySelector(".subtotal").innerText = subtotal.toFixed(2);

            calculateGrandTotal();
            updateDueAmount();
        }



        function updateDueAmount() {

            let grandTotal = parseFloat(
                document.getElementById("grandTotal").textContent.replace("MMK", "")
            ) || 0;

            let dueAmount = grandTotal;

            document.getElementById("dueAmount").textContent =
                dueAmount.toFixed(2) + " MMK";

            document.querySelector("input[name='due_amount']").value =
                dueAmount.toFixed(2);
        }

        let inputDiscount = document.getElementById("inputDiscount");
        let inputTax = document.getElementById("inputTax");


        calculateGrandTotal();


        if (inputDiscount) {
            inputDiscount.addEventListener("input", function() {
                calculateGrandTotal();

                let val = parseFloat(this.value) || 0;
                document.getElementById("displayDiscount").textContent =
                    val.toFixed(2) + " MMK";
            });
        }

        if (inputTax) {
            inputTax.addEventListener("input", function() {
                calculateGrandTotal();


            });
        }

        
    </script>
@endpush
