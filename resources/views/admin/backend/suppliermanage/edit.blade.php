@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Supplier</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Suppliers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Supplier</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <form class="needs-validation" action="{{ route('suppliermanage.supplier.update', $supplier->id) }}" method="POST" id="submit-form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                                value="{{$supplier->name}}">
                                            
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="validationCustom01">Phone Number
                                            </label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{$supplier->phone}}">
                                            
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Address:</label>
                                                <textarea name="address" class="form-control">{{ old('address', $supplier->address)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Remark:</label>
                                                <textarea name="remark" class="form-control">{{ old('remark', $supplier->remark) }}</textarea>
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
    {!! JsValidator::formRequest('App\Http\Requests\Supplier\SupplierUpdateRequest', '#submit-form') !!}

@endpush
