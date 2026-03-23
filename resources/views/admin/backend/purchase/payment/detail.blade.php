@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid">
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid my-0">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0"> Purchase Payment Details</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <a href="{{ route('purchase.payment.purchase_due') }}" class="btn btn-dark">Back</a>
                        </ol>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-6">
                                <h5 class="mb-0">
                                    {{ $purchaseData->purchase_no }}
                                </h5>
                            </div>

                            <div class="col-md-6 d-flex justify-content-end">
                                @php
                                    $status = $purchaseData->purchasePayments->last()?->status;

                                    $bgColor = match ($status) {
                                        'Paid' => '#28a745',
                                        'Partial' => '#6f55a0',
                                        default => '#dc3545',
                                    };
                                @endphp
                                <div
                                    style=" background-color: {{ $bgColor }};
                                            color: white;
                                            padding: 15px 40px;
                                            border-radius: 10px;
                                            font-size: 20px;
                                            font-weight: 500;
                                            min-width: 250px;
                                            text-align: center;">
                                    {{ $status }} Payment
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            {{-- supp info --}}
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-0 h-100" style="border-radius: 10px; transition:0.2s;">
                                    <div class="card-header text-white text-center"
                                        style="background:linear-gradient(135deg, #17a2b8, #0f7383); border-radius:10px 10px 0px 0px;">
                                        <h5 class="mb-0 fw-bold" style="color: white;">Supplier Information</h5>
                                    </div>
                                    <div class="card-body p-4">

                                        <div class="d-flex align-items-center mb-3">
                                            <strong class="me-2 text-muted">Name:</strong>
                                            <span>{{ $purchaseData->supplier->name ?? '' }}</span>
                                        </div>

                                        <div class="d-flex align-items-center mb-3">
                                            <strong class="me-2 text-muted">Address:</strong>
                                            <span>{{ $purchaseData->supplier->address }}</span>
                                        </div>

                                        <div class="d-flex align-items-center mb-3">
                                            <strong class="me-2 text-muted">Phone:</strong>
                                            <span>{{ $purchaseData->supplier->phone }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- customer info --}}

                            {{-- Warehouse info --}}
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-0 h-100" style="border-radius: 10px; transition:0.2s;">
                                    <div class="card-header text-white text-center"
                                        style="background:linear-gradient(135deg, #17a2b8, #0f7383); border-radius:10px 10px 0px 0px;">
                                        <h5 class="mb-0 fw-bold" style="color:white">Company WareHouse Information</h5>
                                    </div>
                                    <div class="card-body p-4">

                                        <div class="d-flex align-items-center mb-3">
                                            <strong class="me-2 text-muted">Warehouse:</strong>
                                            <span>{{ $purchaseData->warehouse->name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Warehouse info --}}


                            {{-- purchase info --}}
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-0 h-100" style="border-radius: 10px; transition:0.2s;">
                                    <div class="card-header text-white text-center"
                                        style="background:linear-gradient(135deg, #17a2b8, #0f7383); border-radius:10px 10px 0px 0px;">
                                        <h5 class="mb-0 fw-bold" style="color:white">Purchase Information</h5>
                                    </div>
                                    <div class="card-body p-2">


                                        <div class="d-flex align-items-center mb-3">
                                            <strong class="me-2 text-muted">Purchase Date:</strong>
                                            <span>{{ $purchaseData->purchase_date }}</span>
                                        </div>

                                        <div class="d-flex align-items-center mb-3">
                                            <strong class="me-2 text-muted">Status:</strong>
                                            <span>{{ $purchaseData->status }}</span>
                                        </div>

                                        <div class="d-flex align-items-center mb-3">
                                            <strong class="me-2 text-muted">Paid Amount:</strong>
                                            <span>{{ $purchaseData->paid_amount }}</span>
                                        </div>

                                        <div class="d-flex align-items-center mb-3">
                                            <strong class="me-2 text-muted">Due Amount:</strong>
                                            <span>{{ $purchaseData->due_amount }}</span>
                                        </div>

                                        <div class="d-flex align-items-center mb-3">
                                            <strong class="me-2 text-muted">Grand Total:</strong>
                                            <span>{{ number_format($purchaseData->total_amount, 2) }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- purchase info --}}


                            <div class="row mt-4">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div style="border-radius: 10px; transition:0.2s;">
                                            <div class="card-header text-white text-center"
                                                style="background:linear-gradient(135deg, #f45d46, #df9a07); border-radius:10px 10px 0px 0px;">
                                                <h5 class="mb-0 fw-bold">Order Summary</h5>
                                            </div>

                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="background-color: #edd5a1">#</th>

                                                            <th style="background-color: #edd5a1">Product Name</th>
                                                            <th style="background-color: #edd5a1">Quantity</th>
                                                            <th style="background-color: #edd5a1">Net Unit Cost</th>
                                                            <th style="background-color: #edd5a1">Discount</th>
                                                            <th style="background-color: #edd5a1">Shipping</th>
                                                            <th style="background-color: #edd5a1">Subtotal</th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>
                                                        @foreach ($purchaseData->purchaseItems as $purchaseItem)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}.</td>
                                                                <td>
                                                                    {{ $purchaseItem->asset->fixedAsset->name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $purchaseItem->quantity ?? 0 }}
                                                                </td>
                                                                <td>{{ number_format($purchaseItem->net_unit_cost, 2) }}
                                                                </td>
                                                                <td>{{ number_format($purchaseItem->discount, 2) }}</td>
                                                                <td>{{ number_format($purchaseData->shipping, 2) }}</td>
                                                                <td>{{ number_format($purchaseData->total_amount, 2) }}
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td colspan="6" class="text-center"
                                                                style="font-weight: bold; background-color: #e9edee ">Total
                                                            </td>

                                                            <td style="font-weight: bold; background-color: #e9edee ">
                                                                {{ number_format($purchaseData->total_amount, 2) }}</td>
                                                        </tr>


                                                    </tbody>

                                                </table>


                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div style="border-radius: 10px; transition:0.2s;">
                                            <div class="card-header text-white text-center"
                                                style="background:linear-gradient(135deg, #62c4eb, #9dd2e7); border-radius:10px 10px 0px 0px;">
                                                <h5 class="mb-0 fw-bold">Payment History</h5>
                                            </div>

                                            <div class="card-body">
                                                <table
                                                    class="table purchaseTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="background-color: #9dd2e7">#</th>
                                                            <th class="text-center" style="background-color: #9dd2e7">
                                                                Payment Date</th>
                                                            <th class="text-center" style="background-color: #9dd2e7">Pay
                                                                Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($purchaseData->purchaseItems as $purchaseItem)
                                                            @foreach ($purchaseData->purchasePayments as $payment)
                                                                <tr>

                                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                                    <td class="text-center">
                                                                        {{ $payment->payment_date?->format('d-M-Y') }}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{ number_format($payment->paid_amount, 2) }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                        @php
                                                            $totalPaid = $purchaseData->purchasePayments->sum(
                                                                'paid_amount',
                                                            );
                                                        @endphp

                                                        <tr>
                                                            <td colspan="2" class="text-center fw-bold"
                                                                style="background-color: #e9edee">
                                                                Total
                                                            </td>
                                                            <td class="text-center fw-bold"
                                                                style="background-color: #e9edee">
                                                                {{ number_format($totalPaid, 2) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
