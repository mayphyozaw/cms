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
                <form class="needs-validation" action="{{ route('client.update', $client->id) }}" method="POST"
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

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Client Type</label>
                                            <select class="form-control" name="client_type" id="client_type">
                                                <option value="">-- Select Client Type--</option>
                                                <option value="Individual"
                                                    {{ $client->client_type === 'Individual' ? 'selected' : '' }}>Individual
                                                </option>
                                                <option value="Company"
                                                    {{ $client->client_type === 'Company' ? 'selected' : '' }}>Company
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="form-label fs-14" class="form-label fs-14">
                                                Client Code Number
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="clientcodePrefix"></span>
                                                <input type="hidden" id="clientcodePrefixHidden" name="prefix_code">
                                                <input type="text" value="{{ Str::after($client->client_code, '-') }}"
                                                    class="form-control" name="client_code">

                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationCustom01">Customer Name
                                            </label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $client->name }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationCustom01">Phone Number
                                            </label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $client->phone }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationCustom01">Email
                                            </label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $client->email }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationCustom01">Contact Person
                                            </label>
                                            <input type="text" class="form-control" name="contact_person"
                                                value="{{ $client->contact_person }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">Address:</label>
                                                <textarea name="address" class="form-control">{{ $client->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
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
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Project Code</label>
                                            <div class="input-group">
                                                <span class="input-group-text">P-</span>
                                                <input type="text" class="form-control" name="project_code"
                                                    value="{{ $client->project_code }}">

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

                                    </div>
                                    <div class="form-row row">

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Building Area
                                            </label>
                                            <input type="text" class="form-control" name="building_area"
                                                value="{{ $client->building_area }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Number of Storeys
                                            </label>
                                            <input type="text" class="form-control" name="storeys"
                                                value="{{ $client->storeys }}">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">
                                                Construction Type</label>
                                            <select class="form-control" name="construction_type">
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
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                Job Scope</label>
                                            <select class="form-control" name="job_scope">
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
                                            <select class="form-control" name="job_package">
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
        $(document).ready(function() {

            const prefixMap = {
                Individual: 'SKGI-',
                Company: 'SKGC-',
            };

            function updatePrefix() {
                let clienttype = $('#client_type').val();
                $('#clientcodePrefix').text(prefixMap[clienttype] || '');
                $('#clientcodePrefixHidden').val(prefixMap[clienttype] || '');
            }

            // Run on page load (EDIT page fix)
            updatePrefix();

            // Run on change (CREATE & EDIT)
            $('#client_type').on('change', function() {
                updatePrefix();
            });

        });
    </script>
@endpush
