<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Of Quantities - {{ $boq->boq_no }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
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



        .container {
            width: 92%;
            margin: 0 auto;
        }

        /* ── Header ── */



        .header {
            padding: 10px;
        }

        .info-section {
            width: 100%;
            /* background: #f8f9fa; */
            border: 1px solid #dcdfe6;
            /* border-radius: 5px; */
            padding: 10px;
        }

        .info-section td {
            border: none;
            padding: 4px 8px;
            /* padding: 12px 16px; */
            background: #f8f9fa;
            vertical-align: top;
            margin: 0 5px;
        }

        /* .info-section td {
            padding: 15px;
            vertical-align: top;
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            margin: 0 5px;
        } */

        .info-box h5 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #0d6efd;
        }

        .info-box p {
            margin: 5px 0;
            font-size: 12px;
        }

        .info-box p strong {
            color: #555;
        }

        .info-box {
            vertical-align: top;
            padding: 10px 15px;
        }

        .info-box table td {
            padding: 4px 0;
            font-size: 12px;
            color: #081854;
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
        .info-boq {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            font-size: 12px;
        }

        .info-boq th {
            background-color: #081854;
            text-align: center;
            padding: 5px;
            color: #fafafa;
            border: 1px solid #ccc;
        }



        .info-boq td {
            /* padding: 6px 8px; */
            padding: 4px 6px;
            /* border: 1px solid #ddd; */
            vertical-align: middle;
            border: 1px solid #ccc;
        }

        .section-row td {
            background-color: #c9efc9;
            font-weight: 600;
            border: 1px solid #ccc;

        }

        .total-row td {
            background-color: #d6ddd6;
            font-weight: 600;
            border: 1px solid #ccc;
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

        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }

        .boq-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }



        .boq-table td {
            border: 1px solid #000;
            padding: 7px;
        }

        .section-row {
            /* background: red; */
            font-weight: bold;
            font-size: 13px;
        }

        .text-right {
            text-align: right;
        }

        .signature-table {
            width: 100%;
            margin-top: 50px;
            text-align: center;
            border-collapse: collapse;
        }

        .signature-table td {
            width: 33%;
            border: none;
            vertical-align: bottom;
        }
    </style>
</head>

<body>
    <div class="container">
        {{-- ── HEADER ── --}}
        <table style="width:100%; border-bottom:2px solid #e3e6f0;" class="header">
            <tr>
                <td style="width:15%; text-align:left;">
                    <img src="{{ public_path('backend/assets/icons/construction.png') }}" width="45">
                </td>

                <td style="width:70%; text-align:center;">
                    <h1 style="margin:0; color:#081854">
                        QUANTITY ESTIMATION SHEET
                    </h1>

                    <h3 style="margin:5px 0 0 0; color:#034c3c; font-family: Arial, Helvetica, sans-serif">
                        DETAILED PROJECT QUANTITY ESTIMATE
                    </h3>
                </td>

                <td style="width:15%; text-align:right;">
                    <img src="{{ public_path('backend/assets/icons/calculator.png') }}" width="45">
                </td>
            </tr>
        </table>


        {{-- Info Section --}}
        <table class="info-section">
            <tr>
                <td class="info-box" width="50%">
                    <table width="100%">
                        <tr>
                            <td width="35%"><strong>Project Code</strong></td>
                            <td width="5%"><strong>:</strong></td>
                            <td><strong>{{ $boq->project?->project_code }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Project Location</strong></td>
                            <td><strong>:</strong></td>
                            <td><strong>{{ $boq->project?->client->site_location }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Client Name</strong></td>
                            <td><strong>:</strong></td>
                            <td><strong>{{ $boq->project?->client->name }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Prepared By</strong></td>
                            <td><strong>:</strong></td>
                            <td><strong>{{ $boq->userPreparedBy?->name }}</strong></td>
                        </tr>
                    </table>
                </td>

                <td class="info-box" width="50%">
                    <table width="100%">
                        <tr>
                            <td width="40%"><strong>Total Built-up Area</strong></td>
                            <td width="5%"><strong>:</strong></td>
                            <td><strong>{{ $boq->project->client->building_area }}</strong> <i>Sq.ft</i></td>
                        </tr>
                        <tr>
                            <td><strong>Type of Work</strong></td>
                            <td><strong>:</strong></td>
                            <td><strong>{{ $boq->project->client->construction_type }}</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Estimate Type</strong></td>
                            <td><strong>:</strong></td>
                            <td><strong>Detailed Estimate</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Date</strong></td>
                            <td><strong>:</strong></td>
                            <td><strong>{{ \Carbon\Carbon::parse($boq->prepared_date)->format('d-M-Y') }}</strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        {{-- Boq Qty Detail --}}

        <p style="margin-bottom:8px; font-size:13px;">
            <strong>Bill of Quantity For :</strong> {{ $boq->title }}
        </p>

        <table class="info-boq">
            <thead>
                <tr>
                    <th>
                        No.
                    </th>

                    <th>
                        PARTICULAR
                    </th>
                    <th>
                        NOS
                    </th>
                    <th>
                        LENGTH
                    </th>
                    <th>
                        WIDTH
                    </th>
                    <th>
                        HEIGHT
                    </th>
                    <th>
                        UNIT
                    </th>
                    <th>
                        QUANTITY
                    </th>

                    <th>
                        REMARKS
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($boq->sections as $section)
                    <tr class="section-row">
                        <td class="text-center">
                            {{ $section->item_no }}
                        </td>
                        <td colspan="8">
                            {{ $section->title }}
                        </td>
                    </tr>

                    @foreach ($section->items as $item)
                        <tr>
                            <td class="text-center" style="font-weight: bold;">{{ $item->item_no }}</td>
                            <td style="font-weight: bold;">{{ $item->title }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ $item->unit }}</td>
                            <td>{{ number_format($item->quantity, 2) }}</td>
                            <td>{{ $item->remark }}</td>
                        </tr>

                        @foreach ($item->drawingMeasurement?->details ?? [] as $detail)
                            <tr>
                                <td></td>
                                <td>{{ $detail->description }}</td>
                                <td>{{ $detail->nos }}</td>
                                <td>{{ $detail->length }}</td>
                                <td>{{ $detail->width }}</td>
                                <td>{{ $detail->height }}</td>
                                <td>{{ $detail->unit }}</td>
                                <td></td>
                                {{-- <td>{{ number_format($detail->gross_quantity, 2) }}</td> --}}
                                <td></td>
                            </tr>
                        @endforeach
                        @php
                            $totalQty = $item->drawingMeasurement->details->sum('gross_quantity');
                        @endphp
                        <tr class="total-row">
                            <td colspan="7" class="text-center">
                                <strong>Total</strong>
                            </td>
                            <td>
                                <strong>{{ number_format($totalQty, 2) }}</strong>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                @endforeach



            </tbody>
        </table>

        {{-- Sign  --}}

        <p style="margin:8px; font-size:13px;">
            <strong>AUTHORIZATION :</strong>
        </p>
        <table class="signature-table">
            <tr>
                <td>
                    Prepared By :  ___________________
                    <br>
                    <strong>{{ $boq->userPreparedBy?->name }}</strong>
                </td>

                <td>
                    Approved By :  ___________________
                    <br>
                   <strong>{{ $boq->userPreparedBy?->name }}</strong>
                    {{-- {{ $boq->userApprovedBy?->name ?? '' }} --}}
                </td>

                <td >
                    Checked By :  ___________________
                    <br>
                    <strong>{{ $boq->userPreparedBy?->name }}</strong>
                    {{-- {{ $boq->user->prepared_by }} --}}
                </td>

                {{-- <td>
                    Checked By
                    <br><br><br><br>
                    ___________________
                    <br>
                    {{ $boq->checked_by }}
                </td> --}}

                
            </tr>
        </table>

    </div>

</body>

</html>
