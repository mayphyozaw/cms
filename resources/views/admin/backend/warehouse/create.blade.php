@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Warehouse</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Warehouse</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Warehouse</li>
                </ol>
            </nav>
        </div>


        <div class="row">

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Warehosue Information</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('warehouse.store') }}" method="POST"
                            id="submit-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-lg-3 form-label">Title</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="name"
                                        @error('name') is-invalid @enderror placeholder="Enter Name" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            <div class="row mb-3">
                                <label class="col-lg-3 form-label">Location</label>
                                <div class="col-lg-9">
                                    <textarea name="address" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-lg-3 form-label">Remark</label>
                                <div class="col-lg-9">
                                    <textarea name="remark" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

          

        </div>
    </div>
@endsection
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\StockManagement\WarehouseStoreRequest', '#submit-form') !!}
@endpush
