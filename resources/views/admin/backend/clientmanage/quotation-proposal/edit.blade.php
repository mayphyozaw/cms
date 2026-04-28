@extends('layouts.app')

@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Proposal</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">
                            Customers
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Edit Quotation Proposal
                    </li>
                </ol>
            </nav>
        </div>

        <form action="{{ route('clientmanage.quototation-proposal.update', $proposalData->id) }}" method="POST"
            id="submit-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- ================= PROJECT INFO ================= --}}
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Subject:
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="main_subject" id="main_subject"
                                        value="{{ $proposalData->main_subject }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Quotation Proposal Date:
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="proposal_date" id="proposal_date"
                                        value="{{ $proposalData->proposal_date }}">
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
                                    <option value="">
                                        Select Work Scope
                                    </option>
                                    @foreach ($workscopes as $workscope)
                                        <option value="{{ $workscope->id }}"
                                            {{ $proposalData->workscope_id == $workscope->id ? 'selected' : '' }}>
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
                                    <option value="Requested" {{ $proposalData->status === 'Requested' ? 'selected' : '' }}>
                                        Requested
                                    </option>
                                    <option value="Accepted" {{ $proposalData->status === 'Accepted' ? 'selected' : '' }}>
                                        Accepted
                                    </option>
                                    <option value="Declined" {{ $proposalData->status === 'Declined' ? 'selected' : '' }}>
                                        Declined
                                    </option>
                                    <option value="Deleted" {{ $proposalData->status === 'Deleted' ? 'selected' : '' }}>
                                        Deleted
                                    </option>
                                    <option value="Draft" {{ $proposalData->status === 'Draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>
                                    <option value="Sent" {{ $proposalData->status === 'Sent' ? 'selected' : '' }}>
                                        Sent
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Customer:
                                </label>
                                <select name="client_id" id="client_id" class="form-control form-select">
                                    <option value="">
                                        Select Customer
                                    </option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}"
                                            {{ $proposalData->client_id == $client->id ? 'selected' : '' }}>
                                            {{ $client->client_code }} - {{ $client->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Project Code:
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        P-
                                    </span>
                                    <input type="text" class="form-control" name="project_code" id="project_code"
                                        value="{{ $proposalData->client->project_code }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Contact Number:
                                </label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    value="{{ $proposalData->client->phone }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Site Location:
                                </label>
                                <input type="text" class="form-control" name="site_location" id="site_location"
                                    value="{{ $proposalData->client->site_location }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Building Area:
                                </label>
                                <input type="text" class="form-control" name="building_area" id="building_area"
                                    value="{{ $proposalData->client->building_area }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Number of Storeys:
                                </label>
                                <input type="text" class="form-control" name="storeys" id="storeys"
                                    value="{{ $proposalData->client->storeys }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Job Scope:
                                </label>
                                <select class="form-control" name="job_scope" id="job_scope">
                                    <option value="">-- Select Job Scope Type--</option>
                                    <option value="Structure"
                                        {{ $proposalData->client->job_scope === 'Structure' ? 'selected' : '' }}>
                                        Structure
                                    </option>
                                    <option value="Electrical"
                                        {{ $proposalData->client->job_scope === 'Electrical' ? 'selected' : '' }}>
                                        Electrical
                                    </option>
                                    <option value="Plumbing"
                                        {{ $proposalData->client->job_scope === 'Plumbing' ? 'selected' : '' }}>
                                        Plumbing
                                    </option>
                                    <option value="PAE"
                                        {{ $proposalData->client->job_scope === 'PAE' ? 'selected' : '' }}>
                                        PAE
                                    </option>
                                    <option value="Steel"
                                        {{ $proposalData->client->job_scope === 'Steel' ? 'selected' : '' }}>
                                        Steel Structure
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">
                                    Construction Type:
                                </label>
                                <select class="form-control" name="construction_type" id="construction_type">
                                    <option value="">-- Select Construction Type--</option>

                                    <option value="Residential"
                                        {{ $proposalData->client->construction_type === 'Residential' ? 'selected' : '' }}>
                                        Residential
                                    </option>
                                    <option value="Commercial"
                                        {{ $proposalData->client->construction_type === 'Commercial' ? 'selected' : '' }}>
                                        Commercial
                                    </option>
                                    <option value="Renovation"
                                        {{ $proposalData->client->construction_type === 'Renovation' ? 'selected' : '' }}>
                                        Renovation
                                    </option>
                                    <option value="PAE"
                                        {{ $proposalData->client->construction_type === 'PAE' ? 'selected' : '' }}>
                                        PAE
                                    </option>
                                    <option value="RC"
                                        {{ $proposalData->client->construction_type === 'RC' ? 'selected' : '' }}>
                                        RC
                                    </option>
                                    <option value="Steel Structure"
                                        {{ $proposalData->client->construction_type === 'Steel Structure' ? 'selected' : '' }}>
                                        Steel Structure
                                    </option>
                                    <option value="Electrical"
                                        {{ $proposalData->client->construction_type === 'Electrical' ? 'selected' : '' }}>
                                        Electrical
                                    </option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                                Unit
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7">
                                                Qty
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7">
                                                Price (MMK)
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7">
                                                Total (MMK)
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7">
                                                Remark
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body">
                                        @php
                                            $boqRowIndex = 0;
                                        @endphp
                                        @foreach ($proposalData->sections as $section)
                                            @php
                                                $boqRowIndex++;
                                            @endphp
                                            <tr class="section-row">
                                                <td>{{ $section->item_no }}</td>
                                                <td colspan="6">
                                                    <input type="text" name="rows[{{ $boqRowIndex }}][title]"
                                                        value="{{ $section->title }}" class="form-control">
                                                    <input type="hidden" name="rows[{{ $boqRowIndex }}][type]"
                                                        value="section">
                                                    <input type="hidden" name="rows[{{ $boqRowIndex }}][item_no]"
                                                        value="{{ $section->item_no }}">
                                                </td>
                                                <td>
                                                    <button type="button" class="remove btn btn-sm btn-danger">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @foreach ($section->items as $item)
                                                @php $boqRowIndex++; @endphp
                                                <tr class="item-row">
                                                    <td>{{ $item->item_no }}</td>
                                                    <td>
                                                        <input type="text" name="rows[{{ $boqRowIndex }}][title]"
                                                            class="form-control" value="{{ $item->title }}">
                                                        <input type="hidden" name="rows[{{ $boqRowIndex }}][type]"
                                                            value="item">
                                                        <input type="hidden" name="rows[{{ $boqRowIndex }}][item_no]"
                                                            value="{{ $item->item_no }}">
                                                    </td>

                                                    <td>
                                                        <input type="text" name="rows[{{ $boqRowIndex }}][unit]"
                                                            class="form-control" value="{{ $item->unit }}">
                                                        <input type="hidden" name="rows[{{ $boqRowIndex }}][type]"
                                                            value="item">
                                                        {{-- <input type="hidden" name="rows[{{ $boqRowIndex }}][item_no]"
                                                            value="${unit}"> --}}
                                                    </td>

                                                    <td>
                                                        <input type="text" name="rows[{{ $boqRowIndex }}][quantity]"
                                                            class="form-control" value="{{ $item->quantity }}">
                                                        <input type="hidden" name="rows[{{ $boqRowIndex }}][type]"
                                                            value="item">
                                                        {{-- <input type="hidden" name="rows[{{ $boqRowIndex }}][item_no]"
                                                            value="${quantity}"> --}}
                                                    </td>
                                                    <td>
                                                        <input type="text" name="rows[{{ $boqRowIndex }}][price]"
                                                            class="form-control" value="{{ $item->price }}">
                                                        <input type="hidden" name="rows[{{ $boqRowIndex }}][type]"
                                                            value="item">
                                                        {{-- <input type="hidden" name="rows[{{ $boqRowIndex }}][item_no]"
                                                            value="${price}"> --}}
                                                    </td>
                                                    <td class="total">
                                                        {{ $item->quantity * $item->price }}
                                                    </td>
                                                    <td>
                                                        <input type="text" name="rows[{{ $boqRowIndex }}][remark]"
                                                            value="{{ $item->remark }}" class="form-control">
                                                    </td>

                                                    <td>
                                                        <button type="button" class="remove btn btn-sm btn-danger">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
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
                    {{-- ================= TOTAL ================= --}}
                    <div class="row">
                        <div class="col-md-6 ms-auto">
                            <div class="card">
                                <div class="card-body pt-7 pb-2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="py-3">
                                                        Subtotal
                                                    </td>
                                                    <td class="py-3" name="subtotal_amount" style="text-align:end"
                                                        id="subtotalDisplay">
                                                        {{ $proposalData->subtotal_amount }} MMK
                                                    </td>
                                                    <input type="hidden" name="subtotal_amount"
                                                        value="{{ $proposalData->subtotal_amount }}">
                                                </tr>
                                                <tr>
                                                    <td class="py-3">
                                                        <div class="row">
                                                            <label class="col-sm-7 form-label">
                                                                Tax :
                                                            </label>
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
                                                    <td class="py-3" id="taxDisplay" style="text-align:end">
                                                        {{ $proposalData->tax_amount }} MMK
                                                    </td>
                                                    <input type="hidden" name="tax_amount"
                                                        value="{{ $proposalData->tax_amount }}">
                                                </tr>

                                                <tr>
                                                    <td class="py-3">
                                                        <div class="row">
                                                            <label class="col-sm-4 form-label">
                                                                Discount :
                                                            </label>
                                                            <div class="col-sm-7">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control"
                                                                        id="inputDiscount" name="discount"
                                                                        value="{{ $proposalData->discount }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="py-3" id="displayDiscount" style="text-align:end">
                                                        {{ $proposalData->discount }} MMK
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-3 text-primary">
                                                        Grand Total
                                                    </td>
                                                    <td class="py-3 text-primary" id="grandTotal" name="total_amount"
                                                        style="text-align:end">
                                                        {{ $proposalData->total_amount }} MMK
                                                    </td>
                                                    <input type="hidden" name="total_amount"
                                                        value="{{ $proposalData->total_amount }}">
                                                </tr>


                                                <tr>
                                                    <td class="py-3 text-primary">
                                                        Due Amount
                                                    </td>
                                                    <td class="py-3 text-primary" id="dueAmount" style="text-align:end">
                                                        {{ $proposalData->due_amount }} MMK
                                                    </td>
                                                    <input type="hidden" name="due_amount"
                                                        value="{{ $proposalData->due_amount }}">
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
                        <label class="form-label">
                            Remark:
                        </label>
                        <textarea class="summernote" name="notes">
                            {{ $proposalData->notes }} 
                        </textarea>
                    </div>

                </div>
            </div>



            {{-- ================= PAYMENT TERMS ================= --}}
            <div class="row">
                <div class="col-md-12 ms-auto">
                    <div class="card">
                        <div class="card-body pt-7 pb-2">
                            <div>
                                <div class="col-md-12 mt-2">
                                    <label class="form-label">
                                        Payment Terms:
                                    </label>
                                    <textarea class="summernote" name="term_notes">
                                        {{ $proposalData->term_notes }}
                                    </textarea>
                                </div>
                                <table class="table table-bordered" id="paymentTermsTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="background-color: #9dd2e7;width:20%">
                                                Name
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7;width:7%">
                                                Percentage (%)
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7;width:20%">
                                                Description
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7;width:15%">
                                                Amount
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7;width:12%">
                                                Payer
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7;width:13%">
                                                Receiver
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7;width:8%">
                                                Date
                                            </th>
                                            <th class="text-center" style="background-color: #9dd2e7; width: 5%">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proposalData->paymentTerms as $index => $paymentTerm)
                                            <tr>
                                                <td>
                                                    <input type="text" name="payment_terms[{{ $index }}][name]"
                                                        class="form-control" value="{{ $paymentTerm->name }}">
                                                </td>
                                                <td>
                                                    <input type="number"
                                                        name="payment_terms[{{ $index }}][percentage]"
                                                        class="form-control percentage"
                                                        value="{{ $paymentTerm->percentage }}">

                                                </td>
                                                <td>
                                                    <input type="text"
                                                        name="payment_terms[{{ $index }}][description]"
                                                        class="form-control" value="{{ $paymentTerm->description }}">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        name="payment_terms[{{ $index }}][amount]"
                                                        class="form-control amount" readonly>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        name="payment_terms[{{ $index }}][payer]"
                                                        class="form-control" value="{{ $paymentTerm->payer ?? '' }}">
                                                </td>
                                                <td>
                                                    <input type="text"
                                                        name="payment_terms[{{ $index }}][receiver]"
                                                        class="form-control" value="{{ $paymentTerm->receiver ?? '' }}">
                                                </td>
                                                <td>
                                                    <input type="date" name="payment_terms[{{ $index }}][date]"
                                                        class="form-control" value="{{ $paymentTerm->date ?? '' }}">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm removeRow">
                                                        X
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary btn-sm" id="addRow">
                                    + Add Row
                                </button>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="form-label">
                                    Remark:
                                </label>
                                <textarea class="summernote" name="remark">
                                    {{ $proposalData->remark }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
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

        });


        // ADD ITEM
        let itemRowIndex = $('#table-body tr').length;
        let sectionCount = {{ $proposalData->sections->count() }};
        let currentSection = 0;
        let sectionItemCount = {
            global: 0
        };
        $('#add-section').click(function() {
            // sectionCount++;
            currentSection = sectionCount;
            sectionItemCount[currentSection] = 0;
            itemRowIndex++;
            let html = `
                    <tr class="section-row">
                        <td>${sectionCount}</td>
                        <td colspan="6">
                            <input type="text" name="rows[${itemRowIndex}][title]" placeholder="Section Title" class="form-control">
                            <input type="hidden" name="rows[${itemRowIndex}][type]" value="section">
                            <input type="hidden" name="rows[${itemRowIndex}][item_no]" value="${sectionCount}">
                        </td>
                        <td>
                            <button type="button" class="remove btn btn-sm btn-danger">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>`;

            $('#table-body').append(html);
            refreshNumbering();
        });

        $('#add-item').click(function() {
            // if (currentSection === 0) {
            //     alert('Add section first!');
            //     return;
            // }
            // sectionItemCount[currentSection]++;
            let itemNo = currentSection + '.' + sectionItemCount[currentSection];
            itemRowIndex++;

            let html = `
                        <tr class="item-row">
                            <td>${itemNo}</td>

                            <td>
                                <input type="text" name="rows[${itemRowIndex}][title]" class="form-control">
                                <input type="hidden" name="rows[${itemRowIndex}][type]" value="item">
                                <input type="hidden" name="rows[${itemRowIndex}][item_no]" value="${itemNo}">
                            </td>

                            <td><input type="text" name="rows[${itemRowIndex}][unit]" class="form-control"></td>
                            <td><input type="number" name="rows[${itemRowIndex}][quantity]" class="form-control qty"></td>
                            <td><input type="number" name="rows[${itemRowIndex}][price]" class="form-control price"></td>

                            <td class="total">0</td>

                            <td><input type="text" name="rows[${itemRowIndex}][remark]" class="form-control"></td>

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
        });

        //CALCULATE ITEM
        $(document).on('input', '.qty,.price', function() {
            let row = $(this).closest('tr');
            let qty = row.find('.qty').val() || 0;
            let price = row.find('.price').val() || 0;
            let total = qty * price;
            row.find('.total').text(total);
            calculateTotal();
        });

        function calculateTotal() {

            let subtotal = 0;

            $('.total').each(function() {
                subtotal += parseFloat($(this).text()) || 0;
            });

            let discount = parseFloat($('#inputDiscount').val()) || 0;
            let taxPercent = parseFloat($('#inputTax').val()) || 0;
            let taxAmount = (subtotal * taxPercent) / 100;

            let grandTotal = subtotal + taxAmount - discount;

            // UI display
            $('#subtotalDisplay').text(subtotal.toFixed(2) + " MMK");
            $('#taxDisplay').text(taxAmount.toFixed(2) + " MMK");
            $('#displayDiscount').text(discount.toFixed(2) + " MMK");
            $('#grandTotal').text(grandTotal.toFixed(2) + " MMK");
            $('#dueAmount').text(grandTotal.toFixed(2) + " MMK");

            // hidden inputs
            $("input[name='total_amount']").val(grandTotal.toFixed(2));
            $("input[name='tax_amount']").val(taxAmount.toFixed(2));
            $("input[name='due_amount']").val(grandTotal.toFixed(2));

            // ✅ update payment terms
            updatePayment(grandTotal);
        }

        // PAYMENT UPDATE
        function updatePayment(total) {

            $('#paymentTermsTable tbody tr').each(function() {

                let percent = parseFloat($(this).find('.percentage').val()) || 0;

                let amount = (total * percent) / 100;

                $(this).find('.amount').val(amount.toFixed(2));
            });
        }
        //PAYMENT PERCENTAGE INPUT
        $(document).on('input', '.percentage', function() {
            calculateTotal();
        });

        let rowIndex = $('#paymentTermsTable tbody tr').length;
        $('#addRow').click(function() {
            let row = `
                        <tr>
                            <td>
                                <input type="text" name="payment_terms[${rowIndex}][name]" class="form-control" placeholder="Enter name">
                            </td>
                            <td>
                                <input type="number" name="payment_terms[${rowIndex}][percentage]" class="form-control percentage" placeholder="%">
                            </td>
                            <td>
                                <input type="text" name="payment_terms[${rowIndex}][description]" class="form-control" placeholder="Description">
                            </td>
                            <td>
                                <input type="text" name="payment_terms[${rowIndex}][amount]" class="form-control amount" readonly>
                            </td>
                            <td>
                                <input type="text" name="payment_terms[${rowIndex}][payer]" class="form-control"
                                    placeholder="Enter Payer">
                            </td>
                            <td>
                                <input type="text" name="payment_terms[${rowIndex}][receiver]" class="form-control"
                                    placeholder="Enter Receiver">
                            </td>
                            <td>
                                <input type="date" name="payment_terms[${rowIndex}][date]" class="form-control"
                                    placeholder="Enter Date">
                            </td>
                            
                            <td>
                                <button type="button" class="btn btn-danger btn-sm removeRow">X</button>
                            </td>
                        </tr>
                    `;
            $('#paymentTermsTable tbody').append(row);
            rowIndex++;
        });

        // REMOVE PAYMENT ROW
        $(document).on('click', '.removeRow', function() {
            $(this).closest('tr').remove();
            calculateTotal();
        });

        $('#inputDiscount, #inputTax').on('input', function() {
            calculateTotal();
        });

        let inputDiscount = document.getElementById("inputDiscount");
        let inputTax = document.getElementById("inputTax");
        calculateTotal();
        if (inputDiscount) {
            inputDiscount.addEventListener("input", function() {
                calculateTotal();

                let val = parseFloat(this.value) || 0;
                document.getElementById("displayDiscount").textContent =
                    val.toFixed(2) + " MMK";
            });
        }
        if (inputTax) {
            inputTax.addEventListener("input", function() {
                calculateTotal();
            });
        }
    </script>
@endpush
