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
                    <li class="breadcrumb-item active" aria-current="page">Edit Customers</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <form class="needs-validation" action="{{ route('clientmanage.client.update', $client->id) }}" method="POST"
                    id="submit-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                                <input type="text" name="client_code" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="validationCustom01">Customer Name
                                            </label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $client->name }}">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="validationCustom01">Phone Number
                                            </label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $client->phone }}">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="validationCustom01">Email
                                            </label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $client->email }}">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="validationCustom01">Contact Person
                                            </label>
                                            <input type="text" class="form-control" name="contact_person"
                                                value="{{ $client->contact_person }}">
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Address:</label>
                                                <textarea name="address" class="form-control">{{ $client->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Remark:</label>
                                                <textarea name="remark" class="form-control">{{ $client->remark }}</textarea>
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
                                                <input type="hidden" name="project_code" value="">
                                            </div>
                                        </div>


                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationDefault04">Site Location</label>
                                            <input type="text" class="form-control" name="site_location"
                                                value="{{ $client->site_location }}">

                                        </div>



                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationDefault03">City</label>
                                            <input type="text" class="form-control" name="city"
                                                value="{{ $client->city }}">

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Construction Type</label>
                                            <select class="form-control select2" name="construction_type">
                                                <option value="">-- Select Construction Type--</option>
                                                <option value="Residential"
                                                    {{ $client->construction_type === 'Residential' ? 'selected' : '' }}>
                                                    Residential</option>
                                                <option value="Commercial"
                                                    {{ $client->construction_type === 'Commercial' ? 'selected' : '' }}>
                                                    Commercial</option>
                                                <option value="Renovation"
                                                    {{ $client->construction_type === 'Renovation' ? 'selected' : '' }}>
                                                    Renovation</option>
                                                <option value="PAE"
                                                    {{ $client->construction_type === 'PAE' ? 'selected' : '' }}>PAE
                                                </option>
                                                <option value="RC"
                                                    {{ $client->construction_type === 'RC' ? 'selected' : '' }}>RC
                                                </option>
                                                <option value="SteelStructure"
                                                    {{ $client->construction_type === 'SteelStructure' ? 'selected' : '' }}>
                                                    Steel Structure</option>
                                                <option value="Electrical"
                                                    {{ $client->construction_type === 'Electrical' ? 'selected' : '' }}>
                                                    Electrical</option>
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
                                                     name="length" id="length" value="{{$client->length}}">
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
                                                     name="width"  id="width" value="{{$client->width}}">
                                                <div class="input-group-text">
                                                    <span>ft</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Building Area
                                            </label>
                                            <input type="text" class="form-control" name="building_area"
                                                value="{{ $client->building_area }}" id="building_area">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Number of Storeys
                                            </label>
                                            <input type="text" class="form-control" name="storeys"
                                                value="{{ $client->storeys }}" id="storeys">
                                        </div>


                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Total Area
                                            </label>

                                            <div class="input-group">
                                                <input type="text" class="form-control" name="total_area" readonly
                                                    id="total_area" value="{{$client->total_area}}">
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
                                                <option value="Structure"
                                                    {{ $client->job_scope === 'Structure' ? 'selected' : '' }}>Structure
                                                </option>
                                                <option value="Electrical"
                                                    {{ $client->job_scope === 'Electrical' ? 'selected' : '' }}>Electrical
                                                </option>
                                                <option value="Plumbing"
                                                    {{ $client->job_scope === 'Plumbing' ? 'selected' : '' }}>Plumbing
                                                </option>
                                                <option value="PAE"
                                                    {{ $client->job_scope === 'PAE' ? 'selected' : '' }}>PAE</option>
                                                <option value="Steel"
                                                    {{ $client->job_scope === 'Steel' ? 'selected' : '' }}>Steel Structure
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                Job Package</label>
                                            <select class="form-control select2" name="job_package">
                                                <option value="">-- Select Job Package--</option>
                                                <option value="NormalPackage"
                                                    {{ $client->job_package === 'NormalPackage' ? 'selected' : '' }}>
                                                    Normal Package</option>
                                                <option value="GoldPackage"
                                                    {{ $client->job_package === 'GoldPackage' ? 'selected' : '' }}>
                                                    Gold Package</option>
                                                <option value="SilverPackage"
                                                    {{ $client->job_package === 'SilverPackage' ? 'selected' : '' }}>
                                                    SilverPackage</option>
                                                <option value="DiamondPackage"
                                                    {{ $client->job_package === 'DiamondPackage' ? 'selected' : '' }}>
                                                    DiamondPackage</option>
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
    {!! JsValidator::formRequest('App\Http\Requests\Client\ClientUpdateRequest', '#submit-form') !!}

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
