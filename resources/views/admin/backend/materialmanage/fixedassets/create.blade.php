@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Fixed Assets</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Fixed Assets</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Fixed Assets</li>
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
                        <form action="{{ route('material.fixedassets.store') }}" method="POST" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Fixed Asset Code</label>
                                    <div class="input-group">
                                        <span class="input-group-text">F-</span>
                                        <input type="text" class="form-control" name="assets_code"
                                            placeholder="Enter Asset Code Number" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Enter Asset Name</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-icons"></i></div>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                                            <option value="{{ $item->id }}">{{ $item->category_name }}
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
                                            name="unit" placeholder="">
                                        @error('unit')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Total Quantity</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-brand-airtable"></i></div>
                                        <input type="text" name="total_qty" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="formBasic">Status : <span
                                            class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control form-select">
                                        <option selected="">Select Status</option>
                                        <option value="Available">Available</option>
                                        <option value="InUse">In Use</option>
                                        <option value="UnderMaintenance">Under Maintenance</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Remark:</label>
                                    <textarea name="remarks" class="form-control"></textarea>
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
    {!! JsValidator::formRequest('App\Http\Requests\FixedAssets\FixedAssetStoreRequest', '#submit-form') !!}

@endpush
