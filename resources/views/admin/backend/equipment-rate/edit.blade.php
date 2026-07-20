@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Equipment Rate History</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('equipment.rate.index') }}">
                        Equipment Rate
                            </a>
                        </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Equipment Rate</li>
                </ol>
            </nav>
        </div>


        <div class="row justify-content-center">

            <div class="col-lg-12 md-12">
                <div class="card border-0 rounded-0">

                    <div class="card-header">
                        <h5 class="card-title">Equipment Rate Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('equipment.rate.update', $eqrate->id) }}" method="POST"
                            id="submit-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Choose Equipment</label>
                                    <select name="equipment_id" id="equipment_id" class="form-control select2">
                                        <option value="">Select Material</option>

                                        @foreach ($equipments as $equipment)
                                            <option value="{{ $equipment->id }}"
                                                {{ $eqrate->equipment_id == $equipment->id ? 'selected' : '' }}>
                                                {{ $equipment->name }}
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
                                            value="{{ $eqrate->rate }}">

                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Effective Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-calendar"></i></div>
                                        <input type="date" class="form-control" name="effective_date"
                                            value="{{ $eqrate->effective_date }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Status</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-coin"></i></div>
                                        <input type="text" class="form-control" name="status"
                                            value="{{ $eqrate->status }}">

                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Remark:</label>
                                    <textarea name="remark" class="form-control">
                                        {{ $eqrate->remark }}
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
    {!! JsValidator::formRequest('App\Http\Requests\Equipment\EquipmentRateUpdateRequest', '#submit-form') !!}
    <script>
        $('.select2').select2({
            width: '100%'
        });
    </script>
@endpush
