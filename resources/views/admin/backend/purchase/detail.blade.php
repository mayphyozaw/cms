@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        {{-- <div class="mb-4">
            <h4 class="mb-1">Purchase Invoice</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Purchase Invoice</li>
                </ol>
            </nav>
        </div> --}}

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'DejaVu Sans', Arial, sans-serif;
                font-size: 12px;
                line-height: 1.5;
                color: #333;
                margin: 20mm;
                background: #fff;
            }

            .invoice-container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
                page-break-inside: avoid;

            }

            .invoice-header {
                background-color: #0d6efd;
                /* Fallback for gradient */
                background-color: #0f4881;
                /* background: linear-gradient(135deg, #0d6efd, #17a2b8); */
                color: #fff;
                padding: 15px;
                text-align: center;
                border-radius: 8px 8px 0 0;
                margin-bottom: 20px;
            }

            .invoice-header h2 {
                font-size: 18px;
                font-weight: bold;
                margin: 0;
            }

            .info-section {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            .info-section td {
                width: 33.33%;
                padding: 15px;
                vertical-align: top;
                background: #f8f9fa;
                border: 1px solid #e9ecef;
                border-radius: 6px;
                margin: 0 5px;
            }

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

            .table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .table th,
            .table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
                font-size: 12px;
            }

            .table th {
                background: #e9ecef;
                /* background-color: #0f4881; */
                font-weight: bold;
                color: #333;
            }

            .table tbody tr:nth-child(even) {
                background: #f8f9fa;
            }

            .summary-table {
                /* width: 100%; */
                /* margin-left: auto; */
                margin-top: 20px;
                border-collapse: collapse;
            }

            .summary-table td {
                padding: 5px;
                text-align: right;
                font-weight: bold;
                border: none;
                font-size: 12px;
            }

            @page {
                margin: 20mm;
            }

            @media print {
                .invoice-container {
                    border: none;
                    padding: 0;
                }

                .info-section td {
                    background: none;
                    border: 1px solid #ddd;
                }

                .letterhead {
                    border-bottom: 2px solid #0d6efd;
                    padding-bottom: 10px;
                    margin-bottom: 15px;
                }

                .logo-name {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                }

                .logo-name img {
                    width: 100%;
                    /* Adjust logo size as needed */
                    height: auto;
                }

                .company-text h2 {
                    font-size: 18px;
                    color: #0d6efd;
                    margin: 0 0 5px 0;
                }

                .company-text p {
                    font-size: 12px;
                    color: #333;
                    margin: 2px 0;
                }

            }
        </style>
        </head>

        {{-- <body> --}}
            <div class="invoice-container">
                {{-- letterhead --}}
                {{-- <div style="display: flex; align-items: flex-start;">
                    <img src="{{ asset('data/logo1.png') }}" alt="Company Logo"
                        style="width:70px; height: auto; margin-right: 15px;">

                    <strong style="margin-right: 25px;">ABC Software Solutions Co., Ltd.</strong>
                    <span>123 Main Street, Yangon, Myanma</span><br>
                    <span>Email: info@abcsoftware.com | Phone: +95 9 123 456 789<span>
                </div> --}}

                {{-- letterhead --}}
                <div class="invoice-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div style="display: flex; align-items: flex-start;">
                                <img src="{{ asset('data/logo1.png') }}" alt="Company Logo" style="width: 70px; height: auto;">

                                <strong style="algin-items: start;">ABC Software Solutions Co., Ltd.</strong>

                            </div>
                            <span>123 Main Street, Yangon, Myanmar</span> <br>
                            <span>Email: info@abcsoftware.com | Phone: +95 9 123 456 789<span>
                        </div>
                        <div class="col-md-6 py-3">
                            <h4 style="color:white">PURCHASE ORDER</h4>
                        </div>
                    </div>

                </div>

                <table class="info-section">
                    <tr>
                        <td class="info-box">
                            <h5>ABC Solution Company</h5>
                            <p><strong>Address:</strong> 123 Main Street, Yangon, Myanmar</p>
                            <p><strong>Phone:</strong> (95) 9 123 456 789</p>
                            <p><strong>Email:</strong> info@abcsoftware.com </p>
                            <p><strong>website:</strong> www.abcsoftware.com </p>
                        </td>
                        
                        <td>
                            <p style="color:#0f4881"><strong>Purchase Order No:</strong> {{ $purchaseData->purchase_no }}
                            </p>
                            <p><strong>Invoice No: &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</strong> INV
                                - 2026 </p>
                            <p><strong>Order Date: &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</strong>
                                {{ $purchaseData->purchase_date }} </p>
                            <p><strong>Delivery Date: &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;</strong>
                                {{ $purchaseData->purchase_date }} </p>
                        </td>
                    </tr>
                    <tr>
                        
                        <td class="info-box">
                            <h5 style="background-color: #0f4881;color:white;padding:7px; width:250px;">Vendor Info</h5>
                            <p><strong>Name:</strong> {{ $purchaseData->supplier->name }} </p>
                            <p><strong>Email:</strong> {{ $purchaseData->supplier->email }}</p>
                            <p><strong>Phone:</strong> {{ $purchaseData->supplier->phone }} </p>
                        </td>

                        <td class="info-box">
                            <h5 style="background-color: #0f4881;color:white;padding:7px; width:250px;">Shipping To</h5>
                            <p><strong>Delivery Address:</strong> {{ $purchaseData->warehouse->name }} </p>
                            <p><strong>Contact Person:</strong> {{ $purchaseData->engineerAssetRequests->user->name ?? '' }} </p>
                            <p><strong>Phone:</strong> {{ $purchaseData->supplier->phone }} </p>
                        </td>
                    </tr>
                </table>

                <h5 style="font-weight: bold; margin: 20px 0 10px;">Order Summary</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="background-color: #0f4881;color:white">#</th>
                            <th style="background-color: #0f4881;color:white">Product Name</th>
                            <th style="background-color: #0f4881;color:white">Quantity</th>
                            <th style="background-color: #0f4881;color:white">Net Unit Cost</th>
                            <th style="background-color: #0f4881;color:white">Discount</th>
                            <th style="background-color: #0f4881;color:white">Subtotal</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($purchaseData->purchaseItems as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->asset->fixedAsset->name ?? '' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->net_unit_cost, 2) }}</td>
                                <td>${{ number_format($item->discount, 2) }}</td>

                                <td>${{ number_format($item->subtotal, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4">

                                </td>

                                <td colspan="1" class="text-start">
                                    Discount
                                </td>
                                <td>
                                    ${{ number_format($purchaseData->discount, 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">

                                </td>
                                <td colspan="1" class="text-start">
                                    Shipping
                                </td>
                                <td>
                                    ${{ number_format($purchaseData->shipping, 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">

                                </td>

                                <td colspan="1" class="text-start" style="background-color: #0f4881;color:white">
                                    Total Amount
                                </td>
                                <td style="background-color: #0f4881;color:white">
                                    ${{ number_format($purchaseData->total_amount, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="summary-table">
                    <tr>
                        <td class="text-start" style="color:#0f4881">Payment Information</td>

                    </tr>
                    <tr>
                        <td class="text-start">
                            <strong>Bank:</strong>
                            KBZ Bank, AYA Bank, CB Bank
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start">
                            <strong>Account Name:</strong>
                            ABC Software Solutions Co., Ltd
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start">
                            <strong>Accoount number:</strong>
                            123456789
                        </td>
                    </tr>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <span> Prepared by: ----------------------------</span> <br><br>
                         <span> Signature: --------------------------------</span> 
                    </div>

                    <div class="col-md-6 text-end">
                        <span> Approved by: ---------------------------</span> <br><br>
                         <span> Date: -------------------------------------</span> 
                    </div>

                </div>
            </div>
    </div>
@endsection
