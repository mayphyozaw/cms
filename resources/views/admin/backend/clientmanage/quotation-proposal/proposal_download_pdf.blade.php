<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Proposal - {{ $proposalData->proposalInvoice_no }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.5;
        }

        .page {
            padding: 30px;
        }

        /* ── Header ── */
        .header {
            display: table;
            width: 100%;
            border-bottom: 2px solid #e3e6f0;
            /* padding-bottom: 15px; */
            /* margin-bottom: 20px; */
        }

        .header-left,
        .header-center,
        .header-right {
            display: table-cell;
            vertical-align: middle;
        }

        .header-center {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }

        .header-right {
            text-align: right;
            font-size: 11px;
        }

        .company-name p {
            font-weight: bold;
            font-size: 13px;
        }

        /* ── Info Section ── */
        .info-section {
            display: table;
            width: 100%;
            border-bottom: 1px solid #e3e6f0;
            padding-bottom: 12px;
            margin-bottom: 15px;
        }

        .info-left,
        .info-right {
            display: table-cell;
            vertical-align: top;
            width: 50%;
        }

        .info-row {
            margin-bottom: 4px;
            padding-bottom: 12px;
            font-size: 13px;
        }

        .info-label {
            display: inline-block;
            width: 140px;
            font-weight: 600;
            
        }

        .badge-danger {
            background-color: #dc3545;
            color: #fff;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 10px;
        }

        /* ── Tables ── */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            font-size: 11px;
        }

        table th {
            background-color: #9dd2e7;
            text-align: center;
            padding: 4px 6px;
            font-weight: 600;
            /* border: 1px solid #ccc; */
        }

        table td {
            padding: 6px 8px;
            /* border: 1px solid #ddd; */
            vertical-align: middle;
        }

        .section-row td {
            background-color: #eef4ff;
            font-weight: 600;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        /* ── Totals ── */
        .totals-wrap {
            display: table;
            width: 100%;
            border-bottom: 1px solid #e3e6f0;
            padding-bottom: 12px;
            margin-bottom: 15px;
        }

        .notes-cell,
        .totals-cell {
            display: table-cell;
            vertical-align: top;
            width: 50%;
        }

        .totals-table {
            width: 100%;
            border-collapse: collapse;
        }

        .totals-table td {
            padding: 5px 0;
            border: none;
            font-size: 12px;
        }

        .totals-table .total-label {
            font-weight: 600;
        }

        .totals-table .total-value {
            text-align: right;
            font-weight: 600;
        }

        .totals-table .border-row td {
            border-bottom: 1px solid #e3e6f0;
            padding-bottom: 6px;
            margin-bottom: 6px;
        }

        .discount-value {
            color: red;
        }

        /* ── Signature ── */
        .signature-section {
            text-align: right;
            border-bottom: 1px solid #e3e6f0;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        /* ── Bank Info ── */
        .bank-center {
            text-align: center;
            border-bottom: 1px solid #e3e6f0;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        /* ── Remarks ── */
        .remark-content p {
            margin-bottom: 6px;
        }

        h5 {
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        h6 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        p {
            margin-bottom: 4px;
        }
    </style>
</head>

<body>
    <div class="page">

        {{-- ── HEADER ── --}}
        <table style="width:100%; border-collapse:collapse; border-bottom:1px solid #e3e6f0; padding-bottom:10px;">
            <tr>
                <td style="width:40%; vertical-align:top; padding-bottom:25px;">
                    <img src="{{ public_path('data/logo1.png') }}" alt="" style="width:80px; margin-bottom:10px;">
                    
                    <div class="company-name">
                        <p style="font-size:13px;">
                            ABC Software Solutions Co., Ltd.
                        </p>
                    </div>

                    <p style="font-size:13px;">
                        123 Main Street, Yangon, Myanmar.
                    </p>
                    <p style="font-size:13px;">
                        Email: info@abcsoftware.com
                    </p>
                    <p style="font-size:13px;">
                        Phone: +95 9 123 456 789
                    </p>
                </td>
                <td style="width:25%; vertical-align:middle; text-align:center; padding-bottom:15px;">
                    <span
                        style="font-size:16px; font-weight:bold;margin-top:40px;font-family:sans-serif;">
                        Quotation Proposal
                    </span>
                </td>
                
                <td style="width:35%; vertical-align:middle; text-align:right; padding-bottom:15px;">

                    <p style="font-size:13px; padding-bottom:8px;">
                        <span style="color:black; font-weight:800;">Proposal No :</span>
                        <span style="color:red;">
                            {{ $proposalData->proposalInvoice_no }}
                        </span>
                    </p>

                    <p style="font-size:13px; padding-bottom:8px;">
                        <span style="color:black; font-weight:800;">
                            Invoice Date :
                        </span style="color:black; font-weight:800;"> 
                            {{ $proposalData->proposal_date }}
                    </p>

                    <p style="font-size:13px; padding-bottom:8px;">
                        <span style="color:black; font-weight:800;">
                            Date :
                        </span style="color:black; font-weight:800;"> 
                            {{ $proposalData->proposal_date }}
                    </p>
                </td>
                
            </tr>
        </table>
        

        {{-- ── CLIENT INFO ── --}}
        <table style="width:100%; border-collapse:collapse; border-bottom:1px solid #e3e6f0; margin-bottom:15px;">
            <tr>
                <td style="width:60%; vertical-align:middle; text-align:left; padding-bottom:15px;">
                    <div class="info-row">
                        <span class="info-label">Invoice No</span>:
                        <span style="color:red; font-weight:800;">
                            {{ $proposalData->proposalInvoice_no }}
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Customer Name</span>:
                        {{ $proposalData->client->name }}
                    </div>
                    <div class="info-row">
                        <span class="info-label">Customer Contact No</span>:
                        {{ $proposalData->client->phone }}
                    </div>
                    <div class="info-row">
                        <span class="info-label">Site Location</span>:
                        {{ $proposalData->client->site_location }}
                    </div>
                    <div class="info-row">
                        <span class="info-label">Work Scope</span>: 
                        {{ $proposalData->main_subject }}
                    </div>
                </td>
                <td style="width:40%; vertical-align:top; text-align:right; padding-top:12px;">
                    <p style="font-size: 13px;">
                        <strong>Date :</strong> 
                        {{ $proposalData->proposal_date }}
                    </p>
                    <p style="font-size: 13px;">
                        <strong>Payment Status</strong> 
                        <span class="badge-danger">
                            {{ $proposalData->status }}
                        </span>
                    </p>
                </td>
            </tr>
        </table>

        {{-- ── ITEMS TABLE ── --}}
        <p style="margin-bottom:8px; font-size:13px;">
            <strong>Quotation Proposal For :</strong> {{ $proposalData->main_subject }}
        </p>

        <table>
            <thead>
                <tr>
                    <th style="width:7%;border: 1px solid #ccc;font-size:13px;">
                        No.
                    </th>
                    <th>Particular</th>
                    <th style="width:8%; border: 1px solid #ccc;font-size:13px;">
                        Unit
                    </th>
                    <th style="width:8%;border: 1px solid #ccc;font-size:13px;">
                        Qty
                    </th>
                    <th style="width:13%;border: 1px solid #ccc;font-size:13px;">
                        Price (MMK)
                    </th>
                    <th style="width:13%;border: 1px solid #ccc;font-size:13px;">
                        Total (MMK)
                    </th>
                    <th style="width:16%;border: 1px solid #ccc;font-size:13px;">
                        Remark
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proposalData->sections as $section)
                    <tr class="section-row">
                        <td style="font-size:12px;">
                            {{ $section->item_no }}
                        </td>
                        <td colspan="6" style="font-size:12px;">
                            {{ $section->title }}
                        </td>
                    </tr>
                    @foreach ($section->items as $item)
                        <tr>
                            <td class="text-center" style="font-size:12px;">
                                {{ $item->item_no }}
                            </td>
                            <td style="font-size:12px;">
                                {{ $item->title }}
                            </td>
                            <td class="text-center" style="font-size:12px;">
                                {{ $item->unit }}
                            </td>
                            <td class="text-center" style="font-size:12px;">
                                {{ $item->quantity }}
                            </td>
                            <td class="text-right" style="font-size:12px;">
                                {{ number_format($item->price, 2) }}
                            </td>
                            <td class="text-right" style="font-size:12px;">
                                {{ number_format($item->total_amount, 2) }}
                            </td>
                            <td style="font-size:12px;">
                                {{ $item->remark }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

        {{-- ── NOTES + TOTALS ── --}}
        <table style="width:100%; border-collapse:collapse; border-bottom:1px solid #e3e6f0; margin-bottom:15px;">
            <tr>
                <td style="width:50%; vertical-align:top; padding-right:20px; padding-bottom:12px;">
                    <h6 style="font-weight:700;">Specifications Inclusive:</h6>
                    <div style="font-size:13px;">
                        {!! $proposalData->notes !!}
                    </div>
                </td>
                <td style="width:50%; vertical-align:top; padding-bottom:12px;">
                    <table style="width:100%; border-collapse:collapse;">
                        <tr>
                            <td style="font-weight:600; padding:5px 0; border-bottom:1px solid #e3e6f0;font-size:13px;">
                                Sub Total
                            </td>
                            <td style="text-align:right; font-weight:600; padding:5px 0; border-bottom:1px solid #e3e6f0; font-size:13px;">
                                {{ number_format($proposalData->subtotal_amount, 2) }} MMK
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight:600; padding:5px 0; border-bottom:1px solid #e3e6f0;font-size:13px;">
                                Discount
                            </td>
                            <td
                                style="text-align:right; font-weight:600; color:red; padding:5px 0; border-bottom:1px solid #e3e6f0;font-size:13px;">
                                {{ number_format($proposalData->discount, 2) }} MMK
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight:600; padding:5px 0; border-bottom:1px solid #e3e6f0;font-size:13px;">
                                Tax (%)
                            </td>
                            <td
                                style="text-align:right; font-weight:600; padding:5px 0; border-bottom:1px solid #e3e6f0;font-size:13px;">
                                {{ number_format($proposalData->tax_amount, 2) }} MMK
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight:700; font-size:13px; padding:5px 0;font-size:13px;">
                                Total Amount
                            </td>
                            <td style="text-align:right; font-weight:700; font-size:13px; padding:5px 0;">
                                {{ number_format($proposalData->total_amount, 2) }} MMK
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        {{-- ── SIGNATURE ── --}}
        <div class="signature-section">
            <p style="margin-top:40px;">
                <strong>May Phyo</strong>
            </p>
            <p>Assistant Manager</p>
        </div>

        {{-- ── PAYMENT TERMS ── --}}
        <div style="margin-bottom:15px;">
            <h5 style="font-size:14px;">Payment Terms</h5>
            <div style="margin:8px 10px; font-size:13px;">
                {!! $proposalData->term_notes !!}
            </div>

            <table>
                <thead>
                    <tr>
                        <th style="width:5%;font-size:13px;border: 1px solid #ccc;">
                            No. (စဉ်)
                        </th>
                        <th style="width:12%;font-size:13px;border: 1px solid #ccc;">
                            Name
                        </th>
                        <th style="width:20%;font-size:13px;border: 1px solid #ccc;">
                            Description (အကြောင်းအရာ)
                        </th>
                        <th style="width:15%;font-size:13px;border: 1px solid #ccc;">
                            Percentage %
                        </th>
                        <th style="width:15%;font-size:13px;border: 1px solid #ccc;">
                            Amount (ငွေပမာဏ)
                        </th>
                        <th style="width:11%;font-size:13px;border: 1px solid #ccc;">
                            Payer
                        </th>
                        <th style="width:11%;font-size:13px;border: 1px solid #ccc;">
                            Receiver
                        </th>
                        <th style="width:11%;font-size:13px;border: 1px solid #ccc;">
                            Date (နေ့စွဲ)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proposalData->paymentTerms as $term)
                        <tr>
                            <td class="text-center;" style="font-size:13px;">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center" style="font-size:13px;">
                                {{ $term->name }}
                            </td>
                            <td class="text-center" style="font-size:13px;">
                                {{ $term->description }}
                            </td>
                            <td class="text-center" style="font-size:13px;">
                                {{ $term->percentage }}%
                            </td>
                            <td class="text-center" style="font-size:13px;">
                                {{ number_format(($proposalData->total_amount / 100) * $term->percentage, 2) }}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Remarks --}}
            <div style="margin-top:10px;">
                <h5 style="font-size:14px;">Remark:</h5>
                <div class="remark-content" style="margin:8px 10px;">
                    @foreach ($proposalData->paymentTerms as $term)
                        <p style="font-size:13px;">{!! $term->remark !!}</p>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ── BANK INFO ── --}}
        <div class="bank-center">
            <p style="margin-bottom:6px;font-size:14px;">Payment Made Via bank transfer / Cheque in the name of <strong>May
                    Phyo</strong></p>
            <p style="font-size:13px;">
                Bank Name : 
                <strong>ABC Bank</strong> &nbsp;|&nbsp; Account Number : 
                <strong>45366287987</strong>
            </p>

            <h5 style="margin-top:12px;font-size:14px;">
                Bank Account Information
            </h5>
            <table style="margin-top:8px;">
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:13px;border: 1px solid #ccc;">Bank</th>
                        <th class="text-center" style="font-size:13px;border: 1px solid #ccc;">Account Number</th>
                        <th class="text-center" style="font-size:13px;border: 1px solid #ccc;">Bank Number</th>
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
</body>

</html>
