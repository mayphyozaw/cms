 
 <!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <title>Quotation Proposal</title>
</head>

<body>
 <table style="width:100%;border:none; border-collapse:collapse;">
        <tr>
            <td style="width:33%; vertical-align:top;">
                <img src="{{ public_path('data/logo1.png') }}" style="width:70px;">
                <p style="margin-top:5px; font-family:DejaVu Sans, sans-serif;">
                    3099 Kennedy Court Framingham,
                </p>
            </td>

            <td style="width:34%; text-align:center; vertical-align:middle;">
                <h3 style="font-family:DejaVu Sans, sans-serif;">Quotation Proposal</h3>
            </td>

            <td style="width:33%; text-align:right; vertical-align:top;">
                <p style="margin-top:10px;"><span>Proposal No:</span>
                    <span style="color:red; font-weight:bold;">{{ $proposalData->proposalInvoice_no }}</span>
                </p>
                <p style="margin-top:10px;"> <span> Invoice Date: </span>
                    {{ \Carbon\Carbon::parse($proposalData->proposal_date)->format('d/m/Y') }}</p>
                <p style="margin-top:10px;"><span>Date:
                        {{ \Carbon\Carbon::parse($proposalData->proposal_date)->format('d/m/Y') }}</p>

            </td>
        </tr>
    </table>

    <hr>

    <table style="width:100%;border:none; border-collapse:collapse;">
        <tr>
            <!-- LEFT -->
            <td style="width:33%; text-align:left; vertical-align:top;">
                <p style="margin-top:5px;">
                    <span>Invoice No:</span>
                    {{ $proposalData->proposalInvoice_no }}
                </p>
                <p style="margin-top:5px;">
                    <span> Customer Name: </span>
                    {{ $proposalData->client->name }}
                </p>
                <p style="margin-top:5px;">
                    <span>Contact Number:
                        {{ $proposalData->client->phone }}
                </p>
                <p style="margin-top:5px;">
                    <span>Site Location: </span>
                    {{ $proposalData->client->site_location }}
                </p>
                <p style="margin-top:5px;">
                    <span>Work Scope:</span>
                    {{ $proposalData->main_subject }}
                </p>

            </td>

            <!-- RIGHT -->
            <td style="width:33%; vertical-align:top;">
                <p style="margin-top:10px;"><span>Date:</span>
                    {{ $proposalData->proposalInvoice_no }}</p>
                <p style="margin-top:10px;">
                    <span>Payment Stauts: <span>
                            <span style="color:red; font-weight:bold;">{{ $proposalData->status }}</span>
                </p>

            </td>
        </tr>
    </table>
    <hr>

    <h3 style="margin:0;">
        Quotation Proposal For: {{ $proposalData->main_subject }}
    </h3>
    <br>

    <table style="width:100%;">
        <thead>
            <tr>
                <th style="background:#9dd2e7;padding:8px; text-align:center;border:1px solid #000;">No</th>
                <th style="background-color:#9dd2e7; padding:8px; text-algin:center;border:1px solid #000;">Particular
                </th>
                <th style="background-color:#9dd2e7; padding:8px; text-algin:center;border:1px solid #000;">Unit</th>
                <th style="background-color:#9dd2e7; padding:8px; text-algin:center;border:1px solid #000;">Qty</th>
                <th style="background-color:#9dd2e7; padding:8px; text-algin:center;border:1px solid #000;">Price</th>
                <th style="background-color:#9dd2e7; padding:8px; text-algin:center;border:1px solid #000;">Total</th>
                <th style="background-color:#9dd2e7; padding:8px; text-algin:center;border:1px solid #000;">Remark</th>
            </tr>
        </thead>
        <tbody style="border:1px solid #eae7e7; padding:6px;">
            @foreach ($proposalData->sections as $section)
                <tr>
                    <td style="padding:8px;border:1px solid #000;">
                        <strong>{{ $section->item_no }}</strong>
                    </td>
                    <td colspan="6" style="padding:8px;border:1px solid #000;">
                        <strong>{{ $section->title }}</strong>
                    </td>

                </tr>

                @foreach ($section->items as $item)
                    <tr>
                        <td style="border:1px solid #000; padding:8px;">
                            {{ $item->item_no }}
                        </td>
                        <td style="border:1px solid #000; padding:8px;">{{ $item->title }}</td>
                        <td style="border:1px solid #000; padding:8px;">{{ $item->unit }}</td>
                        <td style="border:1px solid #000; padding:8px;">{{ $item->quantity }}</td>
                        <td class="text-right" style="border:1px solid #000; padding:8px;">
                            {{ number_format($item->price, 2) }}
                        </td>
                        <td class="text-right" style="border:1px solid #000; padding:8px;">
                            {{ number_format($item->total_amount, 2) }}
                        </td>
                        <td style="border:1px solid #000; padding:8px;">
                            {{ $item->remark }}
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <h3>
        Specifications Inclusive:
    </h3>

    <table style="width:100%;border:none; border-collapse:collapse;">
        <tr>
            <td style="width:33%; vertical-align:top;">
                <p style="margin-top:5px;">
                    {!! $proposalData->notes !!}
                </p>
            </td>

            <td style="width:33%; text-align:right; vertical-align:top;">
                <p style="margin-top:10px;">
                    <span>Sub Total:</span>
                    {{ $proposalData->subtotal_amount }}
                </p>
                <p style="margin-top:10px;">
                    <span> Discount: </span>
                    {{ $proposalData->subtotal_amount }}
                </p>
                <p style="margin-top:10px;">
                    <span> Tax(%): </span>
                    {{ $proposalData->tax_amount }}
                </p>
                <p style="margin-top:10px;">
                    <span> Total Amount: </span>
                    {{ $proposalData->total_amount }}
                </p>

            </td>
        </tr>
    </table>

    <h3 style="text-align:start">
        Payment Terms:
    </h3>
    <p style="margin-top:5px; text-align:start;">
        {!! $proposalData->term_notes !!}
    </p>
    {{-- <table style="width:100%;border-collapse:collapse;table-layout:fixed; font-size:12px;">
        <thead>
            <tr>
                <th style="width:5%; background:#9dd2e7;padding:8px; text-align:center; border:1px solid #000;">
                    No. (စဉ်)
                </th>
                <th style="width:15%; background-color:#9dd2e7; padding:8px; text-align:center; border:1px solid #000;">
                    Name
                </th>
                <th style="width:25%; background-color:#9dd2e7; padding:8px; text-align:center; border:1px solid #000;">
                    Description (အကြောင်းအရာ)
                </th>
                <th style="width:10%; background-color:#9dd2e7; padding:8px; text-align:center; border:1px solid #000;">
                    Percentage % (လုပ်ငန်း ပြီးစီးမှုအလိုက် ပေးချေရမည့် ရာခိုင်နှုန်း)
                </th>
                <th style="width:15%; background-color:#9dd2e7; padding:8px; text-align:center; border:1px solid #000;">
                    Amount (ငွေပမာဏ)
                </th>
                <th style="width:15%; background-color:#9dd2e7; padding:8px; text-align:center; border:1px solid #000;">
                    Payer - ငွေပေးချေသူ (လုပ်ငန်းအပ်နှံသူ)
                </th>
                <th style="width:15%; background-color:#9dd2e7; padding:8px; text-align:center; border:1px solid #000;">
                    Receiver - (လုပ်ငန်းလက်ခံသူ)
                </th>
                <th style="width:10%; background-color:#9dd2e7; padding:8px; text-align:center; border:1px solid #000;">
                    Date (နေ့စွဲ)
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proposalData->paymentTerms as $term)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        {{ $term->name }}
                    </td>
                    <td>
                        {{ $term->description }}
                    </td>
                    <td>
                        {{ $term->percentage }}%
                    </td>
                    <td>
                        {{ number_format(($proposalData->total_amount / 100) * $term->percentage, 2) }}
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
</body>
</html>