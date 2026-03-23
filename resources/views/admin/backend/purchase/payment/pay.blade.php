@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid">
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid my-0">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0"> Purchase Ordrers</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <a href="" class="btn btn-dark">Back</a>
                        </ol>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('payment.pay.store', $purchaseData->id) }}" method="post"
                            enctype="multipart/form-data" id="submit-form" class="assetsAdd">

                            @csrf

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">
                                                Purchase No:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="purchase_no"
                                                value="{{ $purchaseData->purchase_no }}" readonly disabled
                                                style="font-weight: bold">

                                        </div>


                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">
                                                Payment Date & Time:
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="date" class="form-control" name="payment_date"
                                                value="{{ $purchaseData->payment_date?->format('Y-m-d') }}">
                                        </div>

                                        {{-- <div class="col-md-3 mb-3" hidden>
                                            <label class="form-label">
                                                Purchase Date:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" class="form-control" name="payment_date"
                                                value="{{ date('Y-m-d:H-i-s') }}" readonly>

                                        </div> --}}

                                        <input type="hidden" name="warehouse_id" value="{{ $purchaseData->warehouse_id }}">
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group w-100">
                                                <label class="form-label" for="formBasic">
                                                    To Warehouse:
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <select name="warehouse_id" id="warehouse_id"
                                                    class="form-control form-select" disabled>
                                                    <option value="">Select WareHouse</option>
                                                    @foreach ($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}"
                                                            {{ $warehouse->id === $purchaseData->warehouse_id ? 'selected' : '' }}>
                                                            {{ $warehouse->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <input type="hidden" name="supplier_id" value="{{ $purchaseData->supplier_id }}">
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group w-100">
                                                <label class="form-label" for="formBasic">
                                                    Supplier:
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select name="supplier_id" id="supplier_id" class="form-control form-select"
                                                    disabled>
                                                    <option value="">Select Suppliers</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            {{ $supplier->id === $purchaseData->supplier_id ? 'selected' : '' }}>
                                                            {{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Order items: <span class="text-danger">*</span></label>
                                        <table class="table table-bordered dataTable" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 25%;background-color: #9dd2e7;">Fixed Assets</th>
                                                    <th style="width: 15%;background-color: #9dd2e7;">Unit Cost</th>
                                                    <th style="width: 20%;background-color: #9dd2e7;">Qty</th>
                                                    <th style="width: 10%;background-color: #9dd2e7;">Discount</th>
                                                    <th style="width: 20%;background-color: #9dd2e7;">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody id="productBody">
                                                @foreach ($purchaseData->purchaseItems as $item)
                                                    <tr data-id={{ $item->id }}>
                                                        <td>

                                                            {{ $item->asset->fixedAsset->name }}
                                                        </td>

                                                        <td>
                                                            {{ $item->net_unit_cost }}
                                                        </td>

                                                        <td>

                                                            {{ $item->quantity }}
                                                        </td>

                                                        <td>
                                                            <input name="discount[]" class="form-control discount"
                                                                value="{{ $item->discount }}" readonly disabled>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="subtotal">{{ number_format($item->subtotal, 2) }}
                                                                MMK
                                                            </span>
                                                            <input type="hidden" name="subtotal[]"
                                                                value="{{ $item->subtotal }}">
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 ms-auto py-3">
                                        <h6>Payment History</h6>
                                        <br>
                                        @foreach ($purchaseData->purchasePayments ?? [] as $payment)
                                            <div>
                                                <span>
                                                    Pay Date:
                                                
                                                    {{ number_format($payment->paid_amount, 2) }} MMK
                                                    -
                                                    {{ $payment->payment_date?->format('d-M-Y') ?? '-' }}
                                                </span>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="col-md-6 ms-auto">
                                        <div class="card">
                                            <div class="card-body pt-7 pb-2">
                                                <div class="table-responsive">
                                                    <table class="table border">
                                                        <tbody>
                                                            @php
                                                                $displayTotal = $purchaseData->total_amount;

                                                                if ($purchaseData->paid_amount > 0) {
                                                                    $displayTotal = $purchaseData->due_amount;
                                                                }
                                                            @endphp
                                                            <tr>
                                                                <td class="py-3 text-primary">Total Amount</td>
                                                                <td class="py-3 text-primary text-end">
                                                                    {{ number_format($displayTotal, 2) }} MMK
                                                                </td>

                                                                <input type="hidden" name="total_amount"
                                                                    value="{{ $displayTotal }}">
                                                            </tr>

                                                            <tr hidden>
                                                                <td class="py-3 text-primary">Total Amount</td>
                                                                <td class="py-3 text-primary text-end" id="total_amount">
                                                                    {{ number_format($purchaseData->total_amount, 2) }} MMK
                                                                </td>
                                                                <input type="hidden" name="total_amount"
                                                                    value="{{ $purchaseData->total_amount }}">
                                                            </tr>


                                                            <tr hidden>
                                                                <td class="py-3">Pay Amount</td>
                                                                <td class="py-3 text-end">
                                                                    <input type="number" name="paid_amount"
                                                                        id="paidAmount" class="form-control"
                                                                        placeholder="Enter payment amount">

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="py-3">Pay Amount</td>
                                                                <td class="py-3 text-end">
                                                                    <input type="number" name="pay_now" id="paidAmount"
                                                                        class="form-control"
                                                                        placeholder="Enter payment amount" value="">
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="py-3">Due Amount</td>
                                                                <td class="py-3 text-end" id="dueAmount">
                                                                    {{ number_format($purchaseData->due_amount, 2) }} MMK
                                                                </td>
                                                                <input type="hidden" name="due_amount"
                                                                    value="{{ $purchaseData->due_amount }}">
                                                            </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 d-none">
                                        <label class="form-label">Discount: </label>
                                        <input type="number" id="inputDiscount" name="purchase_discount"
                                            class="form-control" value="{{ $purchaseData->discount }}">
                                    </div>

                                    <div class="col-md-4 d-none">
                                        <label class="form-label">Shipping: </label>
                                        <input type="number" id="inputShipping" name="shipping" class="form-control"
                                            value="{{ $purchaseData->shipping }}">
                                    </div>

                                    <div class="col-md-4" hidden>
                                        <div class="form-group w-100">
                                            <label class="form-label" for="formBasic">Status : <span
                                                    class="text-danger">*</span></label>
                                            <select name="status" id="status" class="form-control form-select">
                                                <option value="">Select Status</option>
                                                <option value="Received"
                                                    {{ $purchaseData->status === 'Received' ? 'selected' : '' }}>
                                                    Received
                                                </option>
                                                <option value="Pending"
                                                    {{ $purchaseData->status === 'Pending' ? 'selected' : '' }}>
                                                    Pending
                                                </option>
                                                <option value="Ordered"
                                                    {{ $purchaseData->status === 'Ordered' ? 'selected' : '' }}>
                                                    Ordered
                                                </option>
                                            </select>
                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <label class="form-label">Notes: </label>
                                    <textarea class="form-control" name="remark" rows="3" placeholder="Enter Remark"></textarea>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="d-flex mt-5 justify-content-start">
                                    <button class="btn btn-primary me-3" type="submit">
                                        Save
                                    </button>
                                    <a class="btn btn-dark" href="{{ route('purchase.index') }}">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const productBody = document.getElementById("productBody");

                const discountInput = document.getElementById("inputDiscount");
                const shippingInput = document.getElementById("inputShipping");

                const displayDiscount = document.getElementById("displayDiscount");
                const shippingDisplay = document.getElementById("shippingDisplay");
                const totalAmountDisplay = document.getElementById("total_amount");


                const totalAmountInput = document.querySelector("input[name='total_amount']");
                const paidAmountInput = document.querySelector("input[name='pay_now']");
                const dueAmountInput = document.querySelector("input[name='due_amount']");
                const dueAmountDisplay = document.getElementById("dueAmount");

                productBody.addEventListener("input", function(e) {
                    if (e.target.classList.contains("qty-input") || e.target.classList.contains(
                            "net_unit_cost")) {
                        let row = e.target.closest("tr");
                        let qty = parseFloat(row.querySelector(".qty-input").value) || 0;
                        let cost = parseFloat(row.querySelector(".net_unit_cost").value) || 0;
                        let discount = parseFloat(row.querySelector(".discount").value) || 0;
                        let subtotal = (qty * cost) - discount;
                        row.querySelector(".subtotal").textContent = subtotal.toFixed(2);

                    }
                });

                function updateSubtotal(row) {
                    let qty = parseFloat(row.querySelector(".qty-input").value);
                    let discount = parseFloat(row.querySelector(".discount-input").value) || 0;
                    let netUnitCost = parseFloat(row.querySelector(".qty-input").dataset.cost);

                    let subtotal = (netUnitCost * qty) - discount;

                    row.querySelector(".subtotal").innerText = subtotal.toFixed(2);

                    row.querySelector("input[name^='products['][name$='][subtotal]']").value = subtotal.toFixed(2);


                    updateGrandTotal();
                }


                function updateGrandTotal() {


                    let subtotalSum = 0;

                    document.querySelectorAll(".subtotal").forEach(function(item) {
                        subtotalSum += parseFloat(item.textContent) || 0;
                    });


                    let discount =
                        parseFloat(document.getElementById("inputDiscount").value) || 0;
                    let shipping =
                        parseFloat(document.getElementById("inputShipping").value) || 0;

                    let grandTotal = subtotalSum - discount + shipping;


                    if (grandTotal < 0) {
                        grandTotal = 0;
                    }


                    document.getElementById("dueAmount").textContent =
                        `MMK ${dueAmount.toFixed(2)}`;

                    document.querySelector("input[name='due_amount']").value =
                        dueAmount.toFixed(2);

                    calculateDueAmount();
                }



                function calculateDueAmount() {

                    let grandTotal = parseFloat(totalAmountInput.value) || 0;

                    let paidAmount = parseFloat(paidAmountInput.value) || 0;


                    if (paidAmount < 0) paidAmount = 0;


                    let due = grandTotal - paidAmount;

                    if (due < 0) due = 0;

                    dueAmountDisplay.textContent = due.toFixed(2) + " MMK";
                    dueAmountInput.value = due.toFixed(2);
                }

                discountInput.addEventListener("input", updateGrandTotal);
                shippingInput.addEventListener("input",
                    updateGrandTotal);

                paidAmountInput.addEventListener("input", calculateDueAmount);


                updateGrandTotal();

                if (inputDiscount) {
                    inputDiscount.addEventListener("input", updateGrandTotal);
                    inputDiscount.addEventListener("input", function() {
                        if (displayDiscount) displayDiscount.textContent = this.value || 0;
                    });
                }

                if (inputShipping) {
                    inputShipping.addEventListener("input", updateGrandTotal);
                    inputShipping.addEventListener("input", function() {
                        if (shippingDisplay) shippingDisplay.textContent = this.value || 0;
                    });
                }

                if (paidAmountInput) {
                    paidAmountInput.addEventListener("input", calculateDueAmount);
                }


            });
        </script>
    @endpush
