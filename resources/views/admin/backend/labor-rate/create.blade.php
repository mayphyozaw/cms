@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Labor Rate</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('labor.labor-rate.index') }}">
                            Labor Rate
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Labor Rate</li>
                </ol>
            </nav>
        </div>


        <div class="row justify-content-center">

            <div class="col-lg-12 md-12">
                <div class="card border-0 rounded-0">

                    <div class="card-header">
                        <h5 class="card-title">Labor Rate Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('labor.labor-rate.store') }}" method="POST" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Choose Labor Type</label>
                                    <select name="labor_type_id" id="labor_type_id" class="form-control select2">
                                        <option value="">Select Type</option>
                                        @foreach ($laborTypes as $laborType)
                                            <option value="{{ $laborType->id }}">
                                                {{ $laborType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Rate</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-coin"></i></div>
                                        <input type="text" class="form-control @error('rate') is-invalid @enderror"
                                            name="rate" placeholder="">
                                        @error('rate')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Effective Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-calendar"></i></div>
                                        <input type="date"
                                            class="form-control @error('effective_date') is-invalid @enderror"
                                            name="effective_date" placeholder="">
                                        @error('effective_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Status</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-coin"></i></div>
                                        <input type="text" class="form-control @error('status') is-invalid @enderror"
                                            name="status" placeholder="">
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Remark:</label>
                                    <textarea name="remark" class="form-control"></textarea>
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
    {!! JsValidator::formRequest('App\Http\Requests\LaborRate\LaborRateStoreRequest', '#submit-form') !!}
    <script>
        $('.select2').select2({
            width: '100%'
        });
    </script>
@endpush
