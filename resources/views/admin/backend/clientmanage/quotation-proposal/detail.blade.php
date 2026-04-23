@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="content pb-0">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h4 class="mb-0">
                    Proposal Details
                </h4>
                <button class="btn btn-primary" type="button">
                    <i class="ti ti-download me-1"></i>
                    Download
                </button>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h6 class="mb-3 fw-normal fs-14">
                        <a href="{{ route('clientmanage.quototation-proposal.index') }}">
                            <i class="ti ti-arrow-left me-1"></i>
                            Back to Quotation Proposal
                        </a>
                    </h6>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between border-1 border-bottom pb-3 mb-3">
                                <div>
                                    <img src="{{ asset('data/logo.png') }}" class="invoice-light-logo" width="100"
                                        alt="Img">
                                    <img src="{{ asset('data/logo.png') }}" class="dark-logo" width="140" alt="Img">
                                    <p class="mb-0 mt-2">
                                        3099 Kennedy Court Framingham, MA 01702
                                    </p>
                                </div>
                                <div class="mt-5">
                                    <h5 class="justify-content-center">
                                        Quotation Proposal
                                    </h5>
                                </div>
                                <div>
                                    <p class="mb-1 fw-semibold">
                                        Proposal No : 
                                        <span class="text-primary">
                                            {{ $proposalData->proposalInvoice_no }}
                                        </span>
                                    </p>
                                    <p class="mb-1">
                                        Invoice Date : 
                                        <span class="text-dark">
                                            {{ $proposalData->proposal_date }}
                                        </span>
                                    </p>
                                    <p class="mb-0">
                                        Date : 
                                        <span class="text-dark">
                                            {{ $proposalData->proposal_date }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="row pb-3 border-1 border-bottom mb-4">

                                <div class="col-lg-8">
                                    <div class="d-flex mb-1 fw-semibold">
                                        <div style="width: 150px;">Invoice No</div>
                                        <div class="me-2">:</div>
                                        <div class="text-dark">{{ $proposalData->proposalInvoice_no }}</div>
                                    </div>

                                    <div class="d-flex mb-1 fw-semibold">
                                        <div style="width: 150px;">Customer Name</div>
                                        <div class="me-2">:</div>
                                        <div class="text-dark">{{ $proposalData->client->name }}</div>
                                    </div>

                                    <div class="d-flex mb-1 fw-semibold">
                                        <div style="width: 150px;">
                                            Customer Contact No
                                        </div>
                                        <div class="me-2">:</div>
                                        <div class="text-dark">
                                            {{ $proposalData->client->phone }}
                                        </div>
                                    </div>

                                    <div class="d-flex mb-1 fw-semibold">
                                        <div style="width: 150px;">
                                            Site Location
                                        </div>
                                        <div class="me-2">:</div>
                                        <div class="text-dark">
                                            {{ $proposalData->client->site_location }}
                                        </div>
                                    </div>

                                    <div class="d-flex mb-1 fw-semibold">
                                        <div style="width: 150px;">
                                            Work Scope
                                        </div>
                                        <div class="me-2">:</div>
                                        <div class="text-dark">
                                            {{ $proposalData->main_subject }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">

                                    <h5 class="mb-2 fs-14 fw-medium">
                                        Date : {{ $proposalData->proposal_date }} 
                                    </h5>
                                    <h5 class="mb-2 fs-14 fw-medium">
                                        Payment Status 
                                        <span class="badge bg-danger">
                                            {{ $proposalData->status }}
                                        </span>
                                    </h5>
                                    <img src="{{ asset('backend/assets/img/icons/invoice-qr.png') }}" class="d-block"
                                        alt="Img">
                                </div>
                            </div>
                            <style>
                                .proposal-table {
                                    border-collapse: collapse;
                                    width: 100%;
                                }

                                .proposal-table th {
                                    background-color: #9dd2e7;
                                    text-align: center;
                                    padding: 10px;
                                    font-weight: 600;
                                }

                                .proposal-table td {
                                    padding: 8px 10px;
                                    vertical-align: middle;
                                }

                                .proposal-table tbody tr {
                                    border-bottom: 1px solid #e3e6f0;
                                }

                                .proposal-table tbody tr:hover {
                                    background-color: #f8f9fc;
                                }

                                .section-row {
                                    background-color: #eef4ff;
                                    font-weight: 600;
                                }

                                .text-end {
                                    text-align: right;
                                }

                                .text-center {
                                    text-align: center;
                                }
                            </style>
                            <div class="mb-4">
                                <p>
                                    Quotation Proposal For : 
                                    <span class="text-dark">
                                        {{ $proposalData->main_subject }}
                                    </span>
                                 </p>
                                <div>

                                    <div class="table-responsive">
                                        <table class="proposal-table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%">
                                                        No.
                                                    </th>
                                                    <th>
                                                        Particular
                                                    </th>
                                                    <th style="width:8%">
                                                        Unit
                                                    </th>
                                                    <th style="width:8%">
                                                        Qty
                                                    </th>
                                                    <th style="width:15%">
                                                        Price (MMK)
                                                    </th>
                                                    <th style="width:15%">
                                                        Total (MMK)
                                                    </th>
                                                    <th style="width:20%">
                                                        Remark
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($proposalData->sections as $section)
                                                    <tr class="section-row">
                                                        <td>
                                                            {{ $section->item_no }}
                                                        </td>
                                                        <td colspan="6">
                                                            {{ $section->title }}
                                                        </td>
                                                    </tr>
                                                    @foreach ($section->items as $item)
                                                        <tr>
                                                            <td>
                                                                {{ $item->item_no }}
                                                            </td>
                                                            <td>
                                                                {{ $item->title }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $item->unit }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $item->quantity }}
                                                            </td>
                                                            <td class="text-end">
                                                                {{ number_format($item->price, 2) }}
                                                            </td>
                                                            <td class="text-end">
                                                                {{ number_format($item->total_amount, 2) }}</td>
                                                            <td>
                                                                {{ $item->remark }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3 mb-3 border-1 border-bottom ">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div>
                                            <div class=" mb-3">
                                                <h6 class="mb-1 fs-14 fw-semibold"> 
                                                    Specifications Inclusive: 
                                                </h6>
                                                <div class="proposal-content" style="margin: 10px;">
                                                    {!! $proposalData->notes !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <div
                                                class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-2">
                                                <h6 class="fs-14 fw-medium mb-0">
                                                    Sub Total
                                                </h6>
                                                <h6 class="fs-14 fw-medium mb-0">
                                                    {{ number_format($proposalData->subtotal_amount, 2) }} MMK
                                                </h6>
                                            </div>
                                            <div
                                                class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-2">
                                                <h6 class="fs-14 fw-medium mb-0">
                                                    Discount
                                                </h6>
                                                <h6 class="fs-14 fw-medium mb-0">
                                                    <span
                                                        style="color:red">{{ number_format($proposalData->discount, 2) }}</span>
                                                    MMK
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <h6 class="fs-14 fw-medium mb-0">
                                                    Tax(%)
                                                </h6>
                                                <h6 class="fs-14 fw-medium mb-0">
                                                    {{ number_format($proposalData->tax_amount, 2) }} MMK
                                                </h6>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="mb-0">
                                                    TotalAmount
                                                </h6>
                                                <h6 class="mb-0">
                                                    {{ number_format($proposalData->total_amount, 2) }} MMk
                                                </h6>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end border-bottom mb-3 pb-3">
                                <div>
                                    <img src="{{ asset('backend/assets/img/icons/signature-img.svg') }}" alt="Img"
                                        class="img-fluid ">
                                    <h6 class="fs-14 fw-semibold"> 
                                        May Phyo 
                                    </h6>
                                    <p class="fs-13 fw-normal mb-0">
                                        Assistant Manager
                                    </p>
                                </div>
                            </div>
                            <div class="pb-3 mb-3 border-1 border-bottom">
                                <h5>Payment Terms</h5>
                                <div class="proposal-content" style="margin: 10px;">
                                    {!! $proposalData->term_notes !!}
                                </div>

                                <div class="py-3">
                                    <table class="proposal-table table-bordered"
                                        style="border-collapse: collapse; width: 100%;">
                                        <thead class="table-light table-bordered">
                                            <tr>
                                                <th class="text-center" style="background-color:#9dd2e7;width:5%"> 
                                                    No. (စဉ်) 
                                                </th>
                                                <th class="text-center" style="background-color:#9dd2e7; width:15%"
                                                    name="payment_terms[0][name]"> 
                                                    Name 
                                                </th>
                                                <th class="text-center" style="background-color:#9dd2e7; width:20%"
                                                    name="payment_terms[0][description]">
                                                    Description (အကြောင်းအရာ)
                                                </th>
                                                <th class="text-center" style="background-color:#9dd2e7;width:15%"
                                                    name="payment_terms[0][percentage]">
                                                    Percentage % (လုပ်ငန်း ပြီးစီးမှုအလိုက် ပေးချေရမည့် ရာခိုင်နှုန်း)
                                                </th>
                                                <th class="text-center" style="background-color:#9dd2e7;width:20%"
                                                    name="payment_terms[0][amount]">
                                                    Amount (ငွေပမာဏ)
                                                </th>
                                                <th class="text-center" style="background-color:#9dd2e7;width:10%"
                                                    name="payment_terms[0][payer]">
                                                    Payer - ငွေပေးချေသူ (လုပ်ငန်းအပ်နှံသူ)</th>
                                                <th class="text-center" style="background-color:#9dd2e7"
                                                    name="payment_terms[0][receiver]">
                                                    Receiver - (လုပ်ငန်းလက်ခံသူ)</th>
                                                <th class="text-center" style="background-color:#9dd2e7;width:15%"
                                                    name="payment_terms[0][date]">
                                                    Date (နေ့စွဲ)
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalData->paymentTerms as $term)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $term->name }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $term->description }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $term->percentage }}%
                                                    </td>
                                                    <td class="text-center">
                                                        {{ number_format(($proposalData->total_amount / 100) * $term->percentage, 2) }}
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="py-3">
                                        <h5>
                                            Remark:
                                        </h5>
                                        <div class="proposal-content" style="margin: 10px;">
                                            @foreach ($proposalData->paymentTerms as $term)
                                                <p>{!! $term->remark !!}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center border-bottom pb-3 mb-3">
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('backend/assets/img/logo.svg') }}" class="invoice-light-logo"
                                            width="130" alt="Img">
                                        <img src="assets/img/logo-white.svg" class="dark-logo" width="130"
                                            alt="Img">
                                    </div>
                                    <p class="fs-13 mb-1">
                                        Payment Made Via bank transfer / Cheque in the name of May Phyo
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                                        <p class="mb-0">
                                            Bank Name : 
                                            <span class="text-dark">
                                                ABC Bank
                                            </span>
                                        </p>
                                        <p class="mb-0">
                                            Account Number : 
                                            <span class="text-dark">
                                                45366287987
                                            </span>
                                        </p>
                                    </div>
                                    <div class="py-4">
                                        <h5>
                                            Bank Account Information
                                        </h5>
                                        <table class="table table-bordered text-nowrap" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th style="background-color: #9dd2e7">
                                                        Bank
                                                    </th>
                                                    <th style="background-color: #9dd2e7">
                                                        Account Number
                                                    </th>
                                                    <th style="background-color: #9dd2e7">
                                                        Bank Number
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>KBZ (OLD)</td>
                                                    <td>ABC Solution</td>
                                                    <td>1105 0311 0022 56801</td>
                                                </tr>
                                                <tr>
                                                    <td>CB (OLD)</td>
                                                    <td>ABC Solution</td>
                                                    <td>0080 6003 0000 0361</td>
                                                </tr>
                                                <tr>
                                                    <td>AYA (OLD)</td>
                                                    <td>ABC Solution</td>
                                                    <td>2002 7788 288</td>
                                                </tr>
                                                <tr>
                                                    <td>AYA (Special)</td>
                                                    <td>ABC Solution</td>
                                                    <td>40029542893</td>
                                                </tr>
                                                <tr>
                                                    <td>UAB (Special)</td>
                                                    <td>ABC Solution</td>
                                                    <td>40029542893</td>
                                                </tr>
                                                <tr>
                                                    <td>KBZ (Special)</td>
                                                    <td>ABC Solution</td>
                                                    <td>40029542893</td>
                                                </tr>
                                                <tr>
                                                    <td>MAB (Special)</td>
                                                    <td>ABC Solution</td>
                                                    <td>40029542893</td>
                                                </tr>
                                                <tr>
                                                    <td>YOMA (OLD)</td>
                                                    <td>ABC Solution</td>
                                                    <td>40029542893</td>
                                                </tr>
                                                <tr>
                                                    <td>KPay</td>
                                                    <td>ABC Solution</td>
                                                    <td>40029542893</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center d-flex align-items-center justify-content-end">
                                <a href="#" class="btn btn-md btn-light me-2 d-flex align-items-center">
                                    <i class="ti ti-copy me-1"></i>
                                    Invoice
                                </a>
                                <a href="#" class="btn btn-md btn-primary d-flex align-items-center"> 
                                    <i class="ti ti-printer me-1"></i>
                                    Print Invoice
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
