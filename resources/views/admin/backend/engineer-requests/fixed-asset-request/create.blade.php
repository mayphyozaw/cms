@extends('layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid">
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid my-0">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Create Fixed Asset Requests</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <a href="" class="btn btn-dark">Back</a>
                        </ol>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('fixed-asset-requests.store')}}" method="post" enctype="multipart/form-data" id="submit-form"
                            class="assetsAdd">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Request Date:
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="date" class="form-control" name="request_date"
                                                value="{{ date('Y-m-d') }}" readonly>
                                            @error('request_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group w-100">
                                                <label class="form-label" for="formBasic">
                                                    Project:
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <select name="project_id" id="project_id" class="form-control form-select">
                                                    <option value="">-----Please Site-----</option>
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->id }}">
                                                            {{-- {{ $assignProject->project_id == $project->id ? 'selected' : '' }}> --}}
                                                            {{ $project->client->project_code ?? '-' }} -
                                                            {{ $project->client->name ?? '-' }}

                                                        </option>
                                                    @endforeach
                                                </select>

                                                {{-- <small id="site_error" class="text-danger d-none">Please select the
                                                    first warehouse</small> --}}
                                            </div>
                                        </div>


                                        <div class="col-md-4 mb-3">
                                            <div class="form-group w-100">
                                                <label class="form-label" for="formBasic">
                                                    Work Scope:
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select name="workscope_id" id="workscope_id"
                                                    class="form-control form-select">
                                                    <option value="">Select Work Scope</option>

                                                    @foreach ($workscopes as $workscope)
                                                        <option value="{{ $workscope->id }}">
                                                            {{ $workscope->title }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label">Request items: <span class="text-danger">*</span></label>
                                        <table class="table table-striped table-bordered dataTable" style="width: 100%; ">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 30%;background-color: #9dd2e7;">Product</th>
                                                    <th style="width: 20%;background-color: #9dd2e7;">Qty</th>
                                                    <th style="width: 20%;background-color: #9dd2e7;">Require Date</th>
                                                    <th style="width: 20%;background-color: #9dd2e7;">Remark</th>
                                                    <th style="width: 20%;background-color: #9dd2e7;">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody id="requestTableBody">

                                                <tr>
                                                    <td>
                                                        <select name="asset_id[]" id="asset_id"
                                                            class="form-control form-select">
                                                            <option value="">Select Asset</option>

                                                            @foreach ($fixedAssets as $fixedAsset)
                                                                <option value="{{ $fixedAsset->id }}">
                                                                    {{ $fixedAsset->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td hidden>
                                                        <input type="number" id="quantity" name="quantity"
                                                            class="form-control" value="0">
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <button class="btn btn-outline-info decrement-qty"
                                                                type="button">-</button>
                                                            <input type="number" class="form-control text-center qty-input"
                                                                name="quantity[]" value="1" min="1"
                                                                style="width:30px;">
                                                            <button class="btn btn-outline-info increment-qty"
                                                                type="button">+</button>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <input type="date" class="form-control" name="require_date[]"
                                                            value="{{ date('Y-m-d') }}">
                                                    </td>
                                                    <td>
                                                        <input name="remark[]" class="form-control">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm remove-product" type="button">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                        <div class="py-3">
                                            <button class="btn btn-info btn-sm" id="addRowBtn" type="button">Add
                                                Row</button>
                                            <button class="btn btn-success btn-sm" type="submit">Save</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- <div class="col-xl-12">
                    <div class="d-flex mt-5 justify-content-end">
                        <button class="btn btn-primary me-3" type="submit">Save</button>
                        <a class="btn btn-secondary" href="{{ route('fixed-asset-requests.index') }}">Cancel</a>
                    </div> --}}
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById("addRowBtn").addEventListener("click", function() {
            let tbody = document.getElementById("requestTableBody");
            let newRow = `
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
                <div class="input-group">
                    <button class="btn btn-outline-info decrement-qty" type="button">-</button>
                    <input type="number"
                           class="form-control text-center qty-input"
                           name="quantity[]"
                           value="1"
                           min="1"
                           style="width:60px;">
                    <button class="btn btn-outline-info increment-qty" type="button">+</button>
                </div>
            </td>

            <td>
                <input type="date"
                       class="form-control"
                       name="require_date[]"
                       value="{{ date('Y-m-d') }}">
            </td>

            <td>
                <input name="remark[]" class="form-control">
            </td>
            <td>
                    <button class="btn btn-danger btn-sm remove-product" type="button"><i class="ti ti-trash"></i>
                    </button>
                </td>
        </tr>
    `;

            tbody.insertAdjacentHTML("beforeend", newRow);

        });


        document.addEventListener("click", function(e) {
            if (e.target.closest(".increment-qty")) {
                let input = e.target.closest(".input-group").querySelector(".qty-input");
                input.value = (parseInt(input.value) || 0) + 1;
            }

        });

        document.addEventListener("click", function(e) {
            if (e.target.closest(".decrement-qty")) {
                let input = e.target.closest(".input-group").querySelector(".qty-input");
                input.value = (parseInt(input.value) || 0) - 1;
            }

        });

        document.addEventListener("click", function(e) {
            if (e.target.closest(".remove-product")) {
                let row = e.target.closest("tr");
                if (document.querySelectorAll("#requestTableBody tr").length > 1) {
                    row.remove();
                } else {
                    alert("At least one row is required.");
                }
            }

        });
    </script>
@endpush
