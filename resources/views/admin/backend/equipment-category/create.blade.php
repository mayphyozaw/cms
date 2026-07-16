@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Equipemnt Category</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('equipment.category.index') }}">
                            Equipment Category
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Equipment Category</li>
                </ol>
            </nav>
        </div>


        <div class="row justify-content-center">

            <div class="col-lg-12 md-12">
                <div class="card border-0 rounded-0">

                    <div class="card-header">
                        <h5 class="card-title">Equipment Category Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('equipment.category.store') }}" method="POST" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf

                            

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Category Name</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-coin"></i></div>
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
                                    <label class="form-label">Description:</label>
                                    <textarea name="description" class="form-control"></textarea>
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
    {!! JsValidator::formRequest('App\Http\Requests\Equipment\CategoryStoreRequest', '#submit-form') !!}
    
@endpush
