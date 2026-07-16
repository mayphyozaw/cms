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
                    <li class="breadcrumb-item active" aria-current="page">Edit Equipment</li>
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
                        <form action="{{ route('equipment.lists.update', $equipment->id) }}" method="POST" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-user"></i></div>
                                        <input type="text" class="form-control"
                                            name="name" value="{{$equipment->name}}">
                                        
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
                                            <option value="{{ $eqCategory->id }}"
                                                {{ old('equipment_category_id', $equipment->equipment_category_id) == $eqCategory->id ? 'selected' : '' }}>
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
                                    <select name="boq_category_id" id="boq_category_id" class="form-control form-select">
                                        <option value="">Select Category</option>
                                        @foreach ($boqCategories as $boqCategory)
                                             <option value="{{ $boqCategory->id }}"
                                                {{ old('boq_category_id', $equipment->boq_category_id) == $boqCategory->id ? 'selected' : '' }}>
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
                                        <input type="text" class="form-control"
                                            name="brand" value="{{$equipment->brand}}">
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Model</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-user"></i></div>
                                        <input type="text" class="form-control"
                                            name="model" value="{{$equipment->model}}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Serial No</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-user"></i></div>
                                        <input type="text" class="form-control"
                                            name="serial_no" value="{{$equipment->serial_no}}">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Capacity Spec</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-user"></i></div>
                                        <input type="text" class="form-control"
                                            name="capacity_spec" value="{{$equipment->capacity_spec}}">
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Rate Unit</label>
                                    <select name="rate_unit" class="form-control select2">
                                        <option value="">Select Unit</option>
                                        <option value="day" {{ $equipment->rate_unit === 'day' ? 'selected' : '' }}>day</option>
                                        <option value="hour" {{ $equipment->rate_unit === 'hour' ? 'selected' : '' }}>hour</option>
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
                                        <option value="Owned" {{ $equipment->ownership_type === 'Owned' ? 'selected' : '' }}>Owned</option>
                                        <option value="Rented" {{ $equipment->ownership_type === 'Rented' ? 'selected' : '' }}>Rented</option>
                                    </select>
                                </div>
                            </div>


                             <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Purchase Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-calendar"></i></div>
                                        <input type="date" class="form-control"
                                            name="purchase_date" value="{{$equipment->purchase_date}}">
                                        
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
                                        <option value="Active" {{ $equipment->status === 'Active' ? 'selected' : '' }}>Active</option>
                                        <option value="UnderMaintenance" {{ $equipment->status === 'UnderMaintenance' ? 'selected' : '' }}>Under Maintenance</option>
                                        <option value="RentedOut" {{ $equipment->status === 'RentedOut' ? 'selected' : '' }}>Rented Out</option>
                                        <option value="Disposed" {{ $equipment->status === 'Disposed' ? 'selected' : '' }}>Disposed</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Remark:</label>
                                    <textarea name="remarks" class="form-control">
                                        {{$equipment->remarks}}
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
    {!! JsValidator::formRequest('App\Http\Requests\Equipment\ListUpdateRequest', '#submit-form') !!}
    <script>
        $('.select2').select2({
            width: '100%'
        });
    </script>
@endpush
