@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid">
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid my-0">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Create Purchase</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <a href="" class="btn btn-dark">Back</a>
                        </ol>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('purchase.store') }}" method="post" enctype="multipart/form-data"
                            id="purchaseForm">
                            @csrf

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Purchase Date:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" class="form-control" name="purchase_date"
                                                value="{{ date('Y-m-d') }}" readonly>
                                            @error('purchase_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group w-100">
                                                <label class="form-label" for="formBasic">
                                                    To Warehouse:
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <select name="warehouse_id" id="warehouse_id"
                                                    class="form-control form-select">
                                                    <option value="">-----Please Warehouse-----</option>
                                                    @foreach ($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}">
                                                            {{ $warehouse->name ?? '-' }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group w-100">
                                                <label class="form-label" for="formBasic">
                                                    Supplier:
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select name="supplier_id" id="supplier_id"
                                                    class="form-control form-select">

                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">
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
                                                    <th style="width: 30%;background-color: #9dd2e7;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itemTable">
                                                <tr>
                                                    <td>
                                                        <select name="asset_id[]" class="form-control form-select">
                                                            <option value="">Select Asset</option>
                                                            @foreach ($fixedAssets as $fixedAsset)
                                                                <option value="{{ $fixedAsset->id }}">
                                                                    {{ $fixedAsset->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>


                                                    <td>
                                                        <input type="number" name="net_unit_cost[]"
                                                            class="form-control net_unit_cost">
                                                    </td>

                                                    <td>
                                                        <div class="input-group">
                                                            <button class="btn btn-outline-info decrement-qty"
                                                                type="button">-</button>

                                                            <input type="number" class="form-control text-center qty-input"
                                                                name="quantity[]" value="1" min="1"
                                                                style="width:30px;">

                                                            <button class="btn btn-outline-info increment-qty"
                                                                type="button">
                                                                +
                                                            </button>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <input name="discount[]" class="form-control discount">
                                                    </td>

                                                    <td>
                                                        <span class="subtotal">
                                                            0.00
                                                            <small style="text-align: end">
                                                                MMK
                                                            </small>
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <button class="btn btn-danger btn-sm removeRow" type="button">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="py-3">
                                            <button class="btn btn-info btn-sm" id="addRowBtn" type="button">
                                                Add Row
                                            </button>

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 ms-auto">
                                        <div class="card">
                                            <div class="card-body pt-7 pb-2">
                                                <div class="table-responsive">
                                                    <table class="table border">
                                                        <tbody >
                                                            <tr>
                                                                <td class="py-3">Discount</td>
                                                                <td class="py-3" id="displayDiscount"> 0.00 MMK</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="py-3">Shipping</td>
                                                                <td class="py-3" id="shippingDisplay"> 0.00 MMK</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="py-3 text-primary">Grand Total</td>
                                                                <td class="py-3 text-primary" id="grandTotal" name="total_amount"> 0.00 MMK
                                                                </td>
                                                                <input type="hidden" name="total_amount">
                                                            </tr>

                                                            <tr hidden>
                                                                <td class="py-3 text-primary">Paid Amount</td>
                                                                <td class="py-3 text-primary" id="paidAmountInput"> 0.00
                                                                    MMK
                                                                </td>
                                                                <input type="hidden" name="paid_amount">
                                                            </tr>
                                                            <tr hidden>
                                                                <td class="py-3 text-primary">Full Paid</td>
                                                                <td class="py-3 text-primary" id="fullPaidInput"> 0.00 MMK
                                                                </td>
                                                                <input type="hidden" name="full_paid">
                                                            </tr>




                                                            <tr>
                                                                <td class="py-3 text-primary">Due Amount</td>
                                                                <td class="py-3 text-primary" id="dueAmount"> 0.00 MMK
                                                                </td>
                                                                <input type="hidden" name="due_amount">
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
                                            class="form-control" value="0.00">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Shipping: </label>
                                        <input type="number" id="inputShipping" name="shipping" class="form-control"
                                            value="0.00">
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group w-100">
                                            <label class="form-label" for="formBasic">Status : <span
                                                    class="text-danger">*</span></label>
                                            <select name="status" id="status" class="form-control form-select">
                                                <option value="">Select Status</option>
                                                <option value="Received">Received</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Ordered">Ordered</option>
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
                                        Submit
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

            document.getElementById("addRowBtn").addEventListener("click", function() {
                const itemTable = document.getElementById("itemTable");
                // let tbody = document.getElementById("itemTable");

                let row = `
                    <tr>
                        <td>
                            <select name="asset_id[]" class="form-control form-select">
                                <option value="">Select Asset</option>
                                @foreach ($fixedAssets as $fixedAsset)
                                <option value="{{ $fixedAsset->id }}">
                                    {{ $fixedAsset->name }}
                                </option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <input type="number" name="net_unit_cost[]" class="form-control net_unit_cost">
                        </td>

                        <td>
                            <div class="input-group">
                                <button class="btn btn-outline-info decrement-qty" type="button">-</button>
                                <input type="number" class="form-control text-center qty-input" name="quantity[]" value="1">
                                <button class="btn btn-outline-info increment-qty" type="button">+</button>
                            </div>
                        </td>
                       

                        <td>
                            <input type="number" name="discount[]" class="form-control discount" value="0">
                        </td>

                        <td>
                            <span class="subtotal" name="total_amount">0.00 MMK</span>
                        </td>

                        <td>
                            <button class="btn btn-danger btn-sm removeRow" type="button">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;

                itemTable.insertAdjacentHTML("beforeend", row);
                updateEvents();
                updateGrandTotal();
            });

            document.addEventListener("input", function(e) {
                if (
                    e.target.classList.contains("net_unit_cost") ||
                    e.target.classList.contains("qty-input") ||
                    e.target.classList.contains("discount")
                ) {

                    let row = e.target.closest("tr");

                    let net_unit_cost = parseFloat(row.querySelector(".net_unit_cost").value) || 0;
                    let qty = parseFloat(row.querySelector(".qty-input").value) || 0;
                    let discount = parseFloat(row.querySelector(".discount").value) || 0;

                    let subtotal = (net_unit_cost * qty) - discount;

                    row.querySelector(".subtotal").textContent = subtotal.toFixed(2);

                    updateGrandTotal();
                }
            });

            document.addEventListener("click", function(e) {
                if (e.target.closest(".removeRow")) {
                    let row = e.target.closest("tr");
                    if (document.querySelectorAll("#itemTable tr").length > 1) {
                        row.remove();
                        updateGrandTotal();
                    }
                }

            });

            // Increment Quantity
            document.addEventListener("click", function(e) {
                if (e.target.closest(".increment-qty")) {
                    let input = e.target.closest(".input-group").querySelector(".qty-input");
                    input.value = (parseInt(input.value) || 0) + 1;
                    let row = e.target.closest("tr");
                    updateSubtotal(row);
                }
            });

            // Decrement Quantity
            document.addEventListener("click", function(e) {
                if (e.target.closest(".decrement-qty")) {
                    let input = e.target.closest(".input-group").querySelector(".qty-input");
                    let current = parseInt(input.value) || 1;
                    if (current > 1) {
                        input.value = current - 1;
                    }
                    let row = e.target.closest("tr");
                    updateSubtotal(row);
                }
            });

            // updateSubtotal
            function updateSubtotal(row) {
                let qty = parseFloat(row.querySelector(".qty-input").value);
                let discount =
                    parseFloat(row.querySelector(".discount").value) || 0;

                let net_unit_cost = parseFloat(row.querySelector(".net_unit_cost").value) || 0;

                // Calculate subtotal after discount
                let subtotal = net_unit_cost * qty - discount;
                row.querySelector(".subtotal").innerText = subtotal.toFixed(2);

                updateGrandTotal();
                updateDueAmount();
            }

            // updateGrandTotal
            function updateGrandTotal() {

                let total = 0;

                document.querySelectorAll(".subtotal").forEach(function(el) {

                    // total += parseFloat(el.textContent) || 0;
                    total += parseFloat(el.textContent.replace("MMK", "")) || 0;

                });

                let discount = parseFloat(document.getElementById("inputDiscount").value) || 0;
                let shipping = parseFloat(document.getElementById("inputShipping").value) || 0;

                total = total - discount + shipping;

                if (total < 0) total = 0;

                document.getElementById("grandTotal").textContent =
                    total.toFixed(2) + " MMK";

                document.querySelector("input[name='total_amount']").value =
                    total.toFixed(2);

                updateDueAmount();

            }


            function updateDueAmount() {


                let grandTotal = parseFloat(
                    document.getElementById("grandTotal").textContent
                ) || 0;

                let dueAmount = grandTotal;


                document.getElementById("dueAmount").textContent =
                    dueAmount.toFixed(2) + " MMK";

                document.querySelector("input[name='due_amount']").value =
                    dueAmount.toFixed(2);
            }

            let inputDiscount = document.getElementById("inputDiscount");
            let inputShipping = document.getElementById("inputShipping");


            updateGrandTotal();


            if (inputDiscount) {
                inputDiscount.addEventListener("input", function() {
                    updateGrandTotal();

                    let val = parseFloat(this.value) || 0;
                    document.getElementById("displayDiscount").textContent =
                        val.toFixed(2) + " MMK";
                });
            }

            if (inputShipping) {
                inputShipping.addEventListener("input", function() {
                    updateGrandTotal();

                    let val = parseFloat(this.value) || 0;
                    document.getElementById("shippingDisplay").textContent =
                        val.toFixed(2) + " MMK";
                });
            }
            
        </script>
    @endpush
