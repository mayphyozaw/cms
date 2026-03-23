@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Purchase Informations</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Purchase</li>
                </ol>
            </nav>
        </div>


        <div class="card border-0 rounded-0">

            {{-- <div class="card-header">
                <h5 class="card-title">Customer Information</h5>
            </div> --}}
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Purchase Information</h5>
                    </div>

                    <div class="col-auto">
                        <x-create-button href="{{ route('purchase.create') }}">
                            Create Purchade
                        </x-create-button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-search d-flex align-items-center">
                    <div class="search-input">
                        <a href="javascript:void(0);" class="btn-searchset"><i
                                class="isax isax-search-normal fs-12"></i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable"
                        class="table purchaseTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Purchase Date</th>
                                <th class="text-center" style="background-color: #9dd2e7">Purchase No</th>
                                <th class="text-center" style="background-color: #9dd2e7">Supplier Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Asset Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Grand Total (MMK)</th>
                                <th class="text-center" style="background-color: #9dd2e7">Status</th>
                                <th class="text-center" style="background-color: #9dd2e7">Payment</th>
                                <th class="text-center" style="background-color: #9dd2e7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchaseAllData as $purchaseData)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">{{ $purchaseData->purchase_date }}</td>
                                    <td class="text-center">{{ $purchaseData->purchase_no }} </td>
                                    <td class="text-center">{{ $purchaseData->supplier->name }}</td>



                                    <td class="text-center">
                                        <table
                                            class="table purchaseTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th style="background-color: #9dd2e7">#.</th>
                                                    <th style="background-color: #9dd2e7">Item Name</th>
                                                    <th style="background-color: #9dd2e7">Quantity</th>
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
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>

                                    <td class="text-center">

                                        {{ number_format($purchaseData->total_amount ?? 0, 2) }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-danger ms-2">
                                            {{ $purchaseData->status }}
                                        </span>
                                    </td>

                                    <td class="text-center" hidden>
                                        <span class="badge bg-danger me-1">
                                            {{ $purchaseData->status }}
                                        </span>
                                    </td>




                                    <td class="text-center">
                                        @php
                                            if ($purchaseData->due_amount == 0) {
                                                $payment_status = 'Paid';
                                            } elseif ($purchaseData->paid_amount > 0) {
                                                $payment_status = 'Partial';
                                            } else {
                                                $payment_status = 'Unpaid';
                                            }
                                        @endphp
                                        <span
                                            class="badge {{ $payment_status == 'Paid' ? 'bg-success' : ($payment_status == 'Partial' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                            {{ $payment_status }}
                                        </span>
                                    </td>


                                    <td>

                                        <a class="btn btn-warning btn-sm btn-icon" href="">
                                            <i class="ti ti-eye"></i>
                                        </a>

                                        <a class="btn btn-sm btn-icon" href=""
                                            style="background-color: #4aa1a3; color:white">
                                            <i class="ti ti-download"></i>
                                        </a>


                                        {{-- <a class="btn btn-sm btn-primary"
                                            href="{{ route('purchase.pay', $purchaseData->id) }}">
                                            Pay
                                        </a> --}}

                                        <a class="btn btn-success btn-sm btn-icon"
                                            href="{{ route('purchase.edit', $purchaseData->id) }}">
                                            <i class="ti ti-edit"></i>
                                        </a>

                                        <!-- DELETE FORM ONLY -->
                                        <form action="" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm btn-icon">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
