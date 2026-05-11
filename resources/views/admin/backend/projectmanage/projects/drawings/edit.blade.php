@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Drawings</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="#">Project</a>
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
                    <form action="{{ route('projectmanage.projects.drawings.update', [$project->id, $drawing->id]) }}"
                        method="POST" id="submit-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                        value=" {{ $drawing->drawing_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Drawing Type: <span style="color:red;">*</span>
                                </label>
                                <select name="drawing_type_id" id="drawing_type_id" class="form-control form-select">
                                    <option value="">Select Drawing Type</option>
                                    @foreach ($drawing_types as $drawing_type)
                                        <option value="{{ $drawing_type->id }}"
                                            {{ $drawing->drawing_type_id == $drawing_type->id ? 'selected' : '' }}>
                                            {{ $drawing_type->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Revision No :
                                </label>
                                <div class="input-group">
                                    <input type="text" name="revision_no" class="form-control"
                                        value="{{ $drawing->revision_no }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Scale Ratio :
                                </label>
                                <div class="input-group">
                                    <input type="text" name="scale_ratio" class="form-control"
                                        value="{{ $drawing->scale_ratio }}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">

                                <label for="drawing_file" class="form-label">
                                    Upload File:
                                </label>

                                <input type="file" class="form-control" name="drawing_file" id="drawing_file"
                                    accept=".pdf,.jpg,.jpeg,.png,.dwg">

                                @if ($drawing->drawing_file)
                                    <small class="text-primary">
                                        Current File:
                                        {{ $drawing->drawing_file }}
                                    </small>
                                @endif

                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Remark:
                                </label>
                                <textarea name="remarks" class="form-control">
                                    {{ $drawing->remarks }}
                                </textarea>
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
                        $('#client_code').val(data.client_code);
                        $('#project_code').val(data.project_code);
                    },

                    error: function() {
                        alert('Unable to fetch customer data');
                    }
                });
            });

        });
    </script>
@endpush
