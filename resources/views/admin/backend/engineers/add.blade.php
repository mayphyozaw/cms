@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Add Site</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Work Scope</li>
                </ol>
            </nav>
        </div>



        <div class="row justify-content-center">

            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Assign Site</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('engineers.store') }}" method="post" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf
                            <br>
                            <h5 class="card-title">1. Engineer</h5>

                            <br>

                            <div class="row mb-3">
                                <label class="col-lg-3 form-label">Engineer</label>
                                <div class="col-lg-9">


                                    <input type="hidden" name="user_id" value="{{ $engineer->id }}">
                                    <input type="text" class="form-control" value="{{ $engineer->name }}" readonly>

                                </div>
                            </div>

                            <br>

                            <h5 class="card-title">2. Project Info</h5>
                            <br>

                            <div class="row">
                                <div class="row mb-3">
                                    <label class="col-lg-3 form-label">
                                        Site Code: </label>
                                    <div class="col-lg-9">
                                        <select name="project_id" id="client_id" class="form-control form-select">
                                            <option value="">Select Site</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">
                                                    {{ $project->client->project_code }} - {{ $project->client->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-lg-3 form-label">Site Location:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="site_location" id="site_location">

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-lg-3 form-label">Building Area:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="building_area" id="building_area">

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-lg-3 form-label">
                                        Construction Type:</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="construction_type" id="construction_type">
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

                                <div class="row mb-3">
                                    <label class="col-lg-3 form-label">Number of Storeys:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="storeys" id="storeys">

                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-lg-3 form-label">
                                        Job Package</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="job_package" id="job_package">
                                            <option value="">-- Select Job Package--</option>
                                            <option value="NormalPackage">Normal Package</option>
                                            <option value="GoldPackage">Gold Package</option>
                                            <option value="SilverPackage">Silver Package</option>
                                            <option value="DiamondPackage">Diamond Package</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                    </div>


                </div>


                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->

    <!-- end col -->

    </div>
    </div>

    </div>

    </div>
@endsection


@push('scripts')
    {{-- {!! JsValidator::formRequest('App\Http\Requests\EngineerAssign\EngineerAssignStoreRequest', '#submit-form') !!} --}}
    <script>
        $(document).ready(function() {

            $('#client_id').on('change', function() {
                let clientId = $(this).val();
                $.ajax({
                    url: "{{ route('projectmanage.clients_get') }}",
                    type: 'GET',
                    data: {
                        client_id: clientId,
                    },

                    success: function(data) {
                        $('#project_code').val(data.project_code);
                        $('#site_location').val(data.site_location);
                        $('#building_area').val(data.building_area);
                        $('#construction_type').val(data.construction_type);
                        $('#job_package').val(data.job_package);
                        $('#storeys').val(data.storeys);
                    },

                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
            });

        });
    </script>
@endpush
