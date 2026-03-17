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
                        <form action="{{ route('purchase.update', $purchaseData->id) }}" method="post"
                            enctype="multipart/form-data" id="submit-form" class="assetsAdd">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        {{-- <input type="hidden" name="warehouse_id" value="{{ $purchaseData->purchase_no }}"> --}}
                                        {{-- <div class="col-md-3 mb-3">
                                            <div class="form-group w-100">
                                                <label class="form-label" for="formBasic">
                                                    Purchase No:
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="purchase_no"
                                                value="{{ $purchaseData->purchase_no }}" readonly style="max-width:300px; font-weight:bold" disabled>
                                            </div>
                                        </div> --}}


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
                                                Purchase Date:
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="date" class="form-control"
                                                value="{{ $purchaseData->purchase_date }}">

                                            {{-- <input type="hidden" name="purchase_date"
                                                value="{{ $purchaseData->purchase_date }}"> --}}

                                        </div>

                                        <div class="col-md-3 mb-3" hidden>
                                            <label class="form-label">
                                                Purchase Date:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" class="form-control" name="purchase_date"
                                                value="{{ date('Y-m-d') }}" readonly>

                                        </div>

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
                                        <table class="table table-striped table-bordered dataTable" style="width: 100%;">
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
                                                        <td class="d-flex align-items-center gap-2">
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->asset->fixedAsset->name }}" disabled
                                                                style="max-width:300px;">

                                                            <input type="hidden" name="asset_id[]"
                                                                value="{{ $item->asset->fixedAsset->id }}">
                                                        </td>

                                                        <td>
                                                            <input type="number" name="net_unit_cost[]"
                                                                class="form-control net_unit_cost"
                                                                value="{{ $item->net_unit_cost }}" readonly>

                                                        </td>

                                                        <td>
                                                            <input type="number" name="quantity[]"
                                                                class="form-control qty-input"
                                                                value="{{ $item->quantity }}" readonly>

                                                        </td>

                                                        <td>
                                                            <input name="discount[]" class="form-control discount"
                                                                value="{{ $item->discount }}" readonly>
                                                        </td>

                                                        <td>
                                                            <span class="subtotal">{{ number_format($item->subtotal, 2) }}
                                                                MMK
                                                            </span>
                                                            <input type="hidden" name="subtotal[]"
                                                                value="{{ $item->subtotal }}">
                                                        </td>

                                                        <td>
                                                            <button class="btn btn-danger btn-sm removeRow"
                                                                type="button">
                                                                <i class="ti ti-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 ms-auto">
                                        <div class="card">
                                            <div class="card-body pt-7 pb-2">
                                                <div class="table-responsive">
                                                    <table class="table border">
                                                        <tbody>
                                                            <tr>
                                                                <td class="py-3">Discount</td>
                                                                <td class="py-3" id="displayDiscount">
                                                                    {{ number_format($purchaseData->discount, 2) }} MMK
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="py-3">Shipping</td>
                                                                <td class="py-3" id="shippingDisplay">
                                                                    {{ number_format($purchaseData->shipping, 2) }} MMK
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="py-3 text-primary">Grand Total</td>
                                                                <td class="py-3 text-primary" id="total_amount">
                                                                    {{ number_format($purchaseData->total_amount, 2) }} MMK
                                                                </td>
                                                                <input type="hidden" name="total_amount"
                                                                    value="{{ $purchaseData->total_amount }}">
                                                            </tr>


                                                            <tr>
                                                                <td class="py-3">Paid Amount</td>
                                                                <td class="py-3" id="paidAmount">
                                                                    <input type="number" name="paid_amount"
                                                                        value="{{ $purchaseData->paid_amount }}"
                                                                        class="form-control">
                                                                </td>
                                                            </tr>
                                                            <!-- new add full paid functionality  -->

                                                            <tr>
                                                                <td class="py-3">Full Amount</td>
                                                                <td class="py-3" id="fullPaid">
                                                                    <input type="text" name="full_paid"
                                                                        id="fullPaidInput"
                                                                        value="{{ number_format($purchaseData->full_paid, 2) }}"
                                                                        class="form-control">
                                                                    <input type="hidden" name="full_paid"
                                                                        value="{{ $purchaseData->full_paid }}"
                                                                        class="form-control">

                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="py-3">Due Amount</td>
                                                                <td class="py-3" id="dueAmount">
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
                                    <div class="col-md-4">
                                        <label class="form-label">Discount: </label>
                                        <input type="number" id="inputDiscount" name="purchase_discount"
                                            class="form-control" value="{{ $purchaseData->discount }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Shipping: </label>
                                        <input type="number" id="inputShipping" name="shipping" class="form-control"
                                            value="{{ $purchaseData->shipping }}">
                                    </div>

                                    <div class="col-md-4">
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
                const paidAmountInput = document.querySelector("input[name='paid_amount']");
                const fullPaidInput = document.querySelector("input[name='full_paid']");
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
                        `MMK ${due.toFixed(2)}`;

                    document.querySelector("input[name='due_amount']").value =
                        dueAmount.toFixed(2);

                    calculateDueAmount();
                }



                function calculateDueAmount() {

                    let grandTotal = parseFloat(totalAmountInput.value) || 0;

                    let paidAmount = parseFloat(paidAmountInput.value) || 0;

                    let fullPaid = parseFloat(fullPaidInput.value) || 0;

                    if (paidAmount < 0) paidAmount = 0;
                    if (fullPaid < 0) fullPaid = 0;

                    let due = grandTotal - (paidAmount + fullPaid);

                    if (due < 0) due = 0;

                    dueAmountDisplay.textContent = due.toFixed(2) + " MMK";
                    dueAmountInput.value = due.toFixed(2);
                }


                productBody.addEventListener("click", function(e) {

                    if (e.target.closest(".removeRow")) {
                        e.target.closest("tr").remove();
                        updateGrandTotal();
                    }

                });

                discountInput.addEventListener("input", updateGrandTotal);
                shippingInput.addEventListener("input",
                    updateGrandTotal);

                paidAmountInput.addEventListener("input", calculateDueAmount);
                fullPaidInput.addEventListener("input",
                    calculateDueAmount);


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

                if (fullPaidInput) {
                    fullPaidInput.addEventListener("input", calculateDueAmount);
                }

            });
        </script>
    @endpush
