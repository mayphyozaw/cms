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
                        <form action="{{ route('labor.type.update', $type->id) }}" method="POST" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-user"></i></div>
                                        <input type="text" class="form-control"
                                            name="name" value="{{$type->name}}">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Unit</label>
                                    <select name="unit" class="form-control select2">
                                        <option value="">Select Unit</option>
                                        <option value="day" {{ $type->unit === 'day' ? 'selected' : '' }}>day</option>
                                        <option value="hour" {{ $type->unit === 'hour' ? 'selected' : '' }}>hour</option>
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
    {!! JsValidator::formRequest('App\Http\Requests\LaborType\LaborTypeUpdateRequest', '#submit-form') !!}
    <script>
        $('.select2').select2({
            width: '100%'
        });
    </script>
@endpush
