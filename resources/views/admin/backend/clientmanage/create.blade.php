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
                <form class="needs-validation" action="{{ route('clientmanage.store') }}" method="POST" id="submit-form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Client Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">

                                    <div class="form-row row">

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Client Type</label>
                                            <select class="form-control" name="client_type" id="client_type">
                                                <option value="">-- Select Client Type--</option>
                                                <option value="Individual">Individual</option>
                                                <option value="Company">Company</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="form-label fs-14" class="form-label fs-14">Client
                                                Code Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="clientcodePrefix"></span>
                                                <input type="text" name="client_code" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationCustom01">Customer Name
                                            </label>
                                            <input type="text" class="form-control" name="name"
                                                @error('name') is-invalid @enderror placeholder="Enter Name" required>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationCustom01">Phone Number
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

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationCustom01">Email
                                            </label>
                                            <input type="text" class="form-control" name="email"
                                                @error('email') is-invalid @enderror placeholder="Enter Email" required>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationCustom01">Contact Person
                                            </label>
                                            <input type="text" class="form-control" name="contact_person"
                                                @error('contact_person	') is-invalid @enderror
                                                placeholder="Enter Contact Person	" required>
                                            @error('contact_person ')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Project Code</label>
                                            <div class="input-group">
                                                <span class="input-group-text">P-</span>
                                                <input type="text" class="form-control" name="project_code"
                                                    placeholder="Enter Project Code Number" required>
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

                                    </div>
                                    <div class="form-row row">

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Building Area
                                            </label>
                                            <input type="text" class="form-control" placeholder="Enter Building Area"
                                                name="building_area" required>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Number of Storeys
                                            </label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter Number of Storeys" name="storeys" required>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Construction Type</label>
                                            <select class="form-control" name="construction_type">
                                                <option value="">-- Select Construction Type--</option>
                                                <option value="Residential">Residential</option>
                                                <option value="Commercial">Commercial</option>
                                                <option value="Renovation">Renovation</option>
                                                <option value="PAE">PAE</option>
                                                <option value="Steel Structure">Steel Structure</option>
                                                <option value="Electrical">Electrical</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                Job Scope</label>
                                            <select class="form-control" name="job_scope">
                                                <option value="">-- Select Job Scope Type--</option>
                                                <option value="Structure">Structure</option>
                                                <option value="Electrical">Electrical</option>
                                                <option value="Plumbing">Plumbing</option>
                                                <option value="PAE">PAE</option>
                                                <option value="Steel Structure">Steel Structure</option>
                                                <option value="Electrical">Electrical</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                Job Package</label>
                                            <select class="form-control" name="job_package">
                                                <option value="">-- Select Job Package--</option>
                                                <option value="GoldPackage">GoldPackage</option>
                                                <option value="SilverPackage">SilverPackage</option>
                                                <option value="DiamondPackage">DiamondPackage</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit form</button>
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

    <script type="text/javascript">
        $(document).ready(function() {

            const prefixMap = {
                Individual: 'SKG-',
                Company: 'SKG-',
            };

            $('#client_type').on('change', function() {
                let clienttype = $(this).val();
                $('#clientcodePrefix').text(prefixMap[clienttype] || '');
            });

        });
    </script>
@endpush
