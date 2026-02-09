@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Supplier</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Suppliers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Supplier</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <form class="needs-validation" action="{{ route('suppliermanage.supplier.store') }}" method="POST" id="submit-form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Supplier Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">

                                    <div class="form-row row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Supplier Name
                                            </label>
                                            <input type="text" class="form-control" name="name"
                                                @error('name') is-invalid @enderror placeholder="Enter Name" required>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="validationCustom01">Phone Number
                                            </label>
                                            <input type="text" class="form-control" name="phone"
                                                @error('phone') is-invalid @enderror placeholder="Enter Phone Number"
                                                required>
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Address:</label>
                                                <textarea name="address" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Remark:</label>
                                                <textarea name="remark" class="form-control"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Supplier\SupplierStoreRequest', '#submit-form') !!}

@endpush
