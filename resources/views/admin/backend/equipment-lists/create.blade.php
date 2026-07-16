@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Equipment Lists</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('equipment.lists.index') }}">
                            Equipment
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Equipment</li>
                </ol>
            </nav>
        </div>

      

        <div class="row justify-content-center">

            <div class="col-lg-12 md-12">
                <div class="card border-0 rounded-0">

                    <div class="card-header">
                        <h5 class="card-title">Equipment List Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('equipment.lists.store') }}" method="POST" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf

                            
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-user"></i></div>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="e.g. Excavator">
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
                                        Choose Equipment Category</label>
                                    <select name="equipment_category_id" id="equipment_category_id" class="form-control select2">
                                        <option value="">Select Category</option>
                                        @foreach ($eqCategories as $eqCategory)
                                            <option value="{{ $eqCategory->id }}">
                                                {{ $eqCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Choose Boq Category</label>
                                    <select name="boq_category_id" id="boq_category_id" class="form-control select2">
                                        <option value="">Select Category</option>
                                        @foreach ($boqCategories as $boqCategory)
                                            <option value="{{ $boqCategory->id }}">
                                                {{ $boqCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                             
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Brand</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-user"></i></div>
                                        <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                            name="brand" placeholder="e.g. Komatsu">
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Model</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-user"></i></div>
                                        <input type="text" class="form-control @error('model') is-invalid @enderror"
                                            name="model" placeholder="e.g. PC200">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Serial No</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-user"></i></div>
                                        <input type="text" class="form-control @error('serial_no') is-invalid @enderror"
                                            name="serial_no" placeholder="e.g. KMT2024-0012">
                                        @error('serial_no')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Capacity Spec</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-user"></i></div>
                                        <input type="text" class="form-control @error('capacity_spec') is-invalid @enderror"
                                            name="capacity_spec" placeholder="e.g. 0.9 m³ bucket">
                                        @error('capacity_spec')
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
                                        Rate Unit</label>
                                    <select name="rate_unit" class="form-control select2">
                                        <option value="">Select Unit</option>
                                        <option value="day">day</option>
                                        <option value="hour">hour</option>
                                    </select>
                                </div>
                            </div>

                            {{-- ownership_type --}}
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Ownership Type
                                    </label>
                                    <select name="ownership_type" class="form-control select2">
                                        <option value="">Select Type</option>
                                        <option value="Owned">Owned</option>
                                        <option value="Rented">Rented</option>
                                    </select>
                                </div>
                            </div>


                             <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Purchase Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-calendar"></i></div>
                                        <input type="date" class="form-control @error('purchase_date') is-invalid @enderror"
                                            name="purchase_date" placeholder="e.g. Mason, Helper">
                                        @error('purchase_date')
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
                                        Status
                                    </label>
                                    <select name="status" class="form-control select2">
                                        <option value="">Select Type</option>
                                        <option value="Active">Active</option>
                                        <option value="Under Maintenance">Under Maintenance</option>
                                        <option value="RentedOut">Rented Out</option>
                                        <option value="Disposed">Disposed</option>
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
    {!! JsValidator::formRequest('App\Http\Requests\Equipment\ListStoreRequest', '#submit-form') !!}
    <script>
        $('.select2').select2({
            width: '100%'
        });
    </script>
@endpush
