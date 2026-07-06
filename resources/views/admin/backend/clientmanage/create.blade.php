@extends('layouts.app')
@section('content')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css"> --}}
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Customers</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Customers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Customers</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <form class="needs-validation" action="{{ route('clientmanage.client.store') }}" method="POST"
                    id="submit-form" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Client Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">

                                    <div class="form-row row">

                                        
                                        <div class="col-md-4 mb-3" hidden>
                                            <label for="form-label fs-14" class="form-label fs-14">
                                                Client Code Number
                                            </label>
                                            <div class="input-group">
                                                <input type="text" name="client_code" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">
                                                Customer Name
                                            </label>
                                            <input type="text" class="form-control" name="name"
                                                @error('name') is-invalid @enderror placeholder="Enter Name" required>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="validationCustom01">
                                                Phone Number
                                            </label>
                                            <input type="text" class="form-control" name="phone"
                                                @error('phone') is-invalid @enderror placeholder="Enter Phone Number"
                                                required>
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="validationCustom01">
                                                Contact Person
                                            </label>
                                            <input type="text" class="form-control" name="contact_person"
                                                placeholder="Enter Contact Person	" required>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">
                                                Email
                                            </label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter Email">
                                        </div>



                                        <div class="col-md-4 mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Address:</label>
                                                <textarea name="address" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Remark:</label>
                                                <textarea name="remark" class="form-control"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Site Details</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm">

                                    <div class="form-row row">
                                        <div class="col-md-4 mb-3" hidden>
                                            <label class="form-label">Project Code</label>
                                            <div class="input-group">
                                                {{-- <span class="input-group-text">P-</span> --}}
                                                <input type="hidden" name="project_code" value="">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationDefault04">Site Location</label>
                                            <input type="text" class="form-control" name="site_location"
                                                placeholder="Enter Site Location" required>
                                        </div>



                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationDefault03">City</label>
                                            <input type="text" class="form-control" name="city" placeholder="City"
                                                required>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Construction Type</label>
                                            <select class="form-control select2" name="construction_type">
                                                <option value="">-- Select Construction Type--</option>
                                                <option value="Residential">Residential</option>
                                                <option value="Commercial">Commercial</option>
                                                <option value="Renovation">Renovation</option>
                                                <option value="PAE">PAE</option>
                                                <option value="RC">RC</option>
                                                <option value="Steel Structure">Steel Structure</option>
                                                <option value="Electrical">Electrical</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-row row">

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">
                                                Length
                                            </label>

                                            <div class="input-group">
                                                <input type="text" class="form-control building_length"
                                                    placeholder="Enter Length" name="length" required id="length">
                                                <div class="input-group-text">
                                                    <span>ft</span>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">
                                                Width
                                            </label>

                                            <div class="input-group">
                                                <input type="text" class="form-control building_width"
                                                    placeholder="Enter Width" name="width" required id="width">
                                                <div class="input-group-text">
                                                    <span>ft</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">
                                                Building Area
                                            </label>

                                            <div class="input-group">
                                                <input type="text" class="form-control" name="building_area"
                                                    id="building_area" readonly>
                                                <div class="input-group-text">
                                                    <span>sqft</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">
                                                Number of Storeys
                                            </label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter Number of Storeys" name="storeys" id="storeys"
                                                required>
                                        </div>

                                        {{-- total_area = length * width * storey; --}}
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Total Area
                                            </label>

                                            <div class="input-group">
                                                <input type="text" class="form-control" name="total_area" readonly
                                                    id="total_area">
                                                <div class="input-group-text">
                                                    <span>sqft</span>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="form-row row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                Job Scope</label>
                                            <select class="form-control select2" name="job_scope">
                                                <option value="">-- Select Job Scope Type--</option>
                                                <option value="Structure">Structure</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="Plumbing">Plumbing</option>
                                                <option value="PAE">PAE</option>
                                                <option value="Steel">Steel Structure</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                Job Package</label>
                                            <select class="form-control select2" name="job_package">
                                                <option value="">-- Select Job Package--</option>
                                                <option value="NormalPackage">Normal Package</option>
                                                <option value="GoldPackage">Gold Package</option>
                                                <option value="SilverPackage">Silver Package</option>
                                                <option value="DiamondPackage">Diamond Package</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Client\ClientStoreRequest', '#submit-form') !!}

    <script>
        $('.select2').select2({
            width: '100%'
        });
    </script>
    <script>
        $(document).ready(function() {

            $('.building_length, .building_width, #storeys').on('input', function() {

                calculateQuantity();

            });

            function calculateQuantity() {

                let length = parseFloat($('#length').val()) || 0;
                let width = parseFloat($('#width').val()) || 0;
                let storeys = parseFloat($('#storeys').val()) || 0;

                let building_area = 0;
                let total_area = 0;

                building_area = length * width;
                total_area = length * width * storeys;

                $('#building_area').val(building_area.toFixed(2));
                $('#total_area').val(total_area.toFixed(2));


            }


        });
    </script>
@endpush
