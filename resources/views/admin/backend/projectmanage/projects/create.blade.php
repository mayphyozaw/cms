@extends('layouts.app')
@section('content')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css"> --}}
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Projects</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Project</li>
                </ol>
            </nav>
        </div>


        <div class="row justify-content-center">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Project Information</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('projectmanage.projects.store') }}" method="POST" id="submit-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">
                                        Customer: </label>
                                    <select name="client_id" id="client_id" class="form-control form-select">
                                        <option value="">Select Customer</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">
                                                {{ $client->client_code }} - {{ $client->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Client Type</label>
                                    <select class="form-control" name="client_type" id="client_type">
                                        <option value="">-- Select Client Type--</option>
                                        <option value="Individual">
                                            Individual
                                        </option>
                                        <option value="Company">
                                            Company
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Client Code Number
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"></span>
                                        {{-- <input type="hidden" id="clientcodePrefixHidden" name="prefix_code"> --}}
                                        <input type="text" class="form-control" name="client_code" id="client_code">

                                    </div>
                                </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Address:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="address" class="form-control" id="address">

                                    </div>
                                </div>



                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Site Location:</label>
                                    <input type="text" class="form-control" name="site_location" id="site_location">

                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">
                                        Building Area:
                                    </label>
                                    <input type="text" class="form-control" name="building_area" id="building_area">
                                </div>



                                <div class="col-md-12 mb-3">
                                    <label class="form-label">
                                        Number of Storeys:
                                    </label>
                                    <input type="text" class="form-control" name="storeys" id="storeys">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">
                                        Job Scope:</label>
                                    <select class="form-control" name="job_scope" id="job_scope">
                                        <option value="">-- Select Job Scope Type--</option>
                                        <option value="Structure">Structure</option>
                                        <option value="Electrical">Electrical</option>
                                        <option value="Plumbing">Plumbing</option>
                                        <option value="PAE">PAE</option>
                                        <option value="Steel">Steel Structure</option>
                                    </select>
                                </div>

                            </div>


                            <div class="col-md-6">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Project Code:</label>
                                    <div class="input-group">
                                        <span class="input-group-text">P-</span>
                                        <input type="text" class="form-control" name="project_code" id="project_code">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">
                                        Construction Type:</label>
                                    <select class="form-control" name="construction_type" id="construction_type">
                                        <option value="">-- Select Construction Type--</option>
                                        <option value="Residential">Residential</option>
                                        <option value="Commercial">Commercial</option>
                                        <option value="Renovation">Renovation</option>
                                        <option value="PAE">PAE</option>
                                        <option value="Steel Structure">Steel Structure</option>
                                        <option value="Electrical">Electrical</option>
                                    </select>
                                </div>



                                <div class="col-md-12 mb-3">
                                    <label class="form-label">
                                        Project Type: </label>
                                    <select class="form-control" name="project_type" id="project_type">
                                        <option value="">-- Select Project Type--</option>
                                        <option value="Developer">Developer</option>
                                        <option value="PAE">PAE</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Project Start Date:</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="start_date" id="start_date">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Project Exepecting End Date:</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="end_date" id="end_date">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">
                                        Project Status: </label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">-- Select Project Type--</option>
                                        <option value="Planned">Planned</option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Complete">Complete</option>
                                    </select>
                                </div>

                                {{-- <div class="col-md-12 mb-3">
                                    <label class="form-label">Overall Progress:</label>

                                    <button type="button" class="btn btn-outline-danger">View Overall Progress</button>
                                </div> --}}
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Remark:</label>

                                    <textarea name="remark" class="form-control"></textarea>
                                </div>


                            </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    </div>
@endsection


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Project\ProjectStoreRequest', '#submit-form') !!}
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
                        $('#address').val(data.address);
                        $('#client_code').val(data.client_code);
                        $('#project_code').val(data.project_code);
                        $('#site_location').val(data.site_location);
                        $('#building_area').val(data.building_area);
                        $('#construction_type').val(data.construction_type);
                        $('#job_scope').val(data.job_scope);
                        $('#storeys').val(data.storeys);
                        $('#client_type').val(data.client_type);
                    },

                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
            });

        });
    </script>
@endpush
