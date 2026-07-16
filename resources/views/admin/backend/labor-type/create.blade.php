@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Labor Type Lists</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('labor.type.index') }}">
                            Labor Type
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Labor Type</li>
                </ol>
            </nav>
        </div>


        <div class="row justify-content-center">

            <div class="col-lg-12 md-12">
                <div class="card border-0 rounded-0">

                    <div class="card-header">
                        <h5 class="card-title">Labor Type Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('labor.type.store') }}" method="POST" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-user"></i></div>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="e.g. Mason, Helper">
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
                                        Unit</label>
                                    <select name="unit" class="form-control select2">
                                        <option value="">Select Unit</option>
                                        <option value="day">day</option>
                                        <option value="hour">hour</option>
                                    </select>
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
    {!! JsValidator::formRequest('App\Http\Requests\LaborType\LaborTypeStoreRequest', '#submit-form') !!}
    <script>
        $('.select2').select2({
            width: '100%'
        });
    </script>
@endpush
