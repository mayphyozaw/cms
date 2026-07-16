@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Labor Rate History</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('labor.labor-rate.index') }}">
                            Labor Rate
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Labor Rate</li>
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
                        <form action="{{ route('labor.labor-rate.update', $laborRate->id) }}" method="POST" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Choose Labor Type</label>
                                    <select name="labor_type_id" id="labor_type_id" class="form-control select2">
                                        <option value="">Select Typr</option>

                                        @foreach ($laborTypes as $laborType)
                                            <option value="{{ $laborType->id }}"
                                                {{ $laborRate->labor_type_id == $laborType->id ? 'selected' : '' }}>
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
                                        <input type="text" class="form-control" name="rate"
                                            value="{{ $laborRate->rate }}">

                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Effective Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-calendar"></i></div>
                                        <input type="date" class="form-control" name="effective_date"
                                            value="{{ $laborRate->effective_date }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Status</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-coin"></i></div>
                                        <input type="text" class="form-control" name="status"
                                            value="{{ $laborRate->status }}">

                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Remark:</label>
                                    <textarea name="remark" class="form-control">
                                        {{ $laborRate->remark }}
                                    </textarea>
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
    {!! JsValidator::formRequest('App\Http\Requests\LaborRate\LaborRateUpdateRequest', '#submit-form') !!}
    <script>
        $('.select2').select2({
            width: '100%'
        });
    </script>
@endpush
