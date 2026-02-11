@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Fixed Assets</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Fixed Assets</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Fixed Assets</li>
                </ol>
            </nav>
        </div>


        <div class="row justify-content-center">

            <div class="col-lg-12 md-12">
                <div class="card border-0 rounded-0">

                    <div class="card-header">
                        <h5 class="card-title">Fixed Assets Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('material.fixedassets.update', $fixedAsset->id) }}" method="POST"
                            id="submit-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Choose Warehouse</label>
                                    <select name="warehouse_id" id="warehouse_id" class="form-control form-select">
                                        <option value="">Select Warehosue</option>
                                        @foreach ($warehouses as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('warehouse_id', $fixedAsset->warehouse_id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Fixed Asset Code</label>
                                    <div class="input-group">
                                        <span class="input-group-text">F-</span>
                                        <input type="text" class="form-control" name="assets_code"
                                            value="{{ $fixedAsset->assets_code }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Enter Asset Name</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-icons"></i></div>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $fixedAsset->name }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Choose Asset Category</label>
                                    <select name="category_id" id="category_id" class="form-control form-select">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('category_id', $fixedAsset->category_id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Unit</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-ruler"></i></div>
                                        <input type="text" class="form-control @error('unit') is-invalid @enderror"
                                            name="unit" value="{{ $fixedAsset->unit }}">

                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6 col-md-12" hidden>
                                <div class="mb-3">
                                    <label class="form-label fs-14">Total Quantity</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-brand-airtable"></i></div>
                                        <input type="text" name="total_qty" class="form-control"
                                            value="{{ $fixedAsset->total_qty }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="formBasic">Status : <span
                                            class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control form-select">
                                        <option selected="">Select Status</option>
                                        <option value="available"
                                            {{ $fixedAsset->status === 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="inUse" {{ $fixedAsset->status === 'inUse' ? 'selected' : '' }}>In
                                            Use</option>
                                        <option value="maintenance"
                                            {{ $fixedAsset->status === 'maintenance' ? 'selected' : '' }}>Under
                                            Maintenance</option>
                                            <option value="damaged" {{ $fixedAsset->status === 'damaged' ? 'selected' : '' }}>
                                            Damaged</option>
                                            <option value="disposed" {{ $fixedAsset->status === 'disposed' ? 'selected' : '' }}>
                                            Disposed</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Remark:</label>
                                    <textarea name="remarks" class="form-control">{{ old('remarks', $fixedAsset->remarks) }}</textarea>
                                </div>
                            </div>

                            <br>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\FixedAssets\FixedAssetUpdateRequest', '#submit-form') !!}
@endpush
