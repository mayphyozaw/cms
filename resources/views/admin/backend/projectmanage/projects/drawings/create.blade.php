@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Drawings</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Drawings
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Drawings Information</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('projectmanage.projects.drawings.store', $project->id) }}" method="POST"
                        id="submit-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Project Code:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="project_id" class="form-control"
                                        value=" {{ $project->client->project_code }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Client Name:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="project_id" class="form-control"
                                        value="{{ $project->client->name }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Drawing Name: <span style="color:red;">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="text" name="drawing_name" class="form-control"
                                        @error('drawing_name') is-invalid @enderror placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Drawing Type: <span style="color:red;">*</span>
                                </label>
                                <select name="drawing_type_id" id="drawing_type_id" class="form-control form-select">
                                    <option value="">Select Drawing Type</option>

                                    @foreach ($drawing_types as $drawing_type)
                                        <option value="{{ $drawing_type->id }}">
                                            {{ $drawing_type->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Drawing Code:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="drawing_code" class="form-control"
                                        @error('drawing_code') is-invalid @enderror placeholder="Enter Name" required>
                                </div>
                            </div> --}}

                            <div class="col-md-6 mb-3" hidden>
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Revision No :
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="Auto Generate" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Scale Ratio :
                                </label>
                                <select name="scale_ratio" class="form-control form-select">
                                    <option value="">Select Scale Ratio</option>
                                    <option value='1_1'>1" = 1'</option>
                                    <option value='1_2'>1" = 2'</option>
                                    <option value='1:50'>1:50</option>
                                    <option value='1:100'>1:100</option>
                                </select>
                                <small class="text-muted">
                                    <span style="color:red">Choose drawing scale ratio (e.g. 1" = 1' means 1 inch on drawing = 1 foot actual)</span>
                                </small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="drawing_file" class="form-label">
                                    Upload File:
                                </label>
                                <input type="file" class="form-control" name="drawing_file" id="drawing_file"
                                    accept=".pdf,.jpg,.jpeg,.png,.dwg">
                                {{-- <input type="file" class="form-control" name="drawing_file" id="drawing_file"> --}}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Remark:
                                </label>
                                <textarea name="remarks" class="form-control"></textarea>
                            </div>

                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    </div>

    </div>
@endsection
@push('scripts')
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
