@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">BOQ</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            BOQ
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">

                <a href="{{ route('projectmanage.projects.index') }}" class="btn btn-outline-light shadow">
                    <span style="color:black">{{ $project->client->project_code }} @
                        {{ $project->client->name }} - ({{ $project->client->length }} * {{ $project->client->width }}) -
                        {{ $project->client->building_area }} sqft
                    </span>
                </a>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="card border-0">

                <div class="card-body pb-0 pt-0 px-2">

                    <ul class="nav nav-tabs nav-bordered nav-bordered-primary">

                        <li class="nav-item me-3">
                            <a href="{{ route('projectmanage.projects.boq.index', $project->id) }}"
                                class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.bq.boq.index') ? 'active' : '' }}">
                                <i class="ti ti-settings-cog me-2"></i>
                                BOQ
                            </a>
                        </li>

                        {{-- <li class="nav-item me-3">
                            <a href="{{ route('projectmanage.projects.boq.index', $project->id) }}"
                                class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.bq.boq.index') ? 'active' : '' }}">
                                <i class="ti ti-settings-cog me-2"></i>
                                BOQ 
                            </a>
                        </li> --}}


                    </ul>

                </div>
            </div>

            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">BOQ Approved </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projectmanage.projects.boq-approved.store', [$project->id, $boq->id]) }}"
                            method="POST" id="submit-form" enctype="multipart/form-data">
                            @csrf
                            

                            <div class="row mb-3">

                                <label class="col-sm-3 form-label">
                                    Approved By:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="approved_by" class="form-control select2">
                                            <option value="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->name }} @ {{ $user->department }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Approved Date:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="approved_date">
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Project Code:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" name="project_id" class="form-control"
                                            value=" {{ $project->client->project_code }}" readonly disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Client Name:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" name="project_id" class="form-control"
                                            value="{{ $project->client->name }}" readonly disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    BOQ Date:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="boq_date"
                                            value="{{ $boq->boq_date }}">

                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Revision No:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="revision_no"
                                            value="{{ $boq->revision_no }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">

                                <label class="col-sm-3 form-label">
                                    Prepared By:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="prepared_by" class="form-control select2">
                                            <option value="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->id == $boq->prepared_by ? 'selected' : '' }}>
                                                    {{ $user->name }} @ {{ $user->department }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Prepared Date:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="prepared_date"
                                            value="{{ $boq->prepared_date }}" readonly>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="form-label fs-14" class="form-label fs-14 col-sm-3">
                                    Status:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="status" class="form-control select2">
                                            <option value="">Select Status</option>

                                            <option value="draft" {{ $boq->status == 'draft' ? 'selected' : '' }}>
                                                Draft
                                            </option>

                                            <option value="pending" {{ $boq->status == 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>

                                            <option value="rejected" {{ $boq->status == 'rejected' ? 'selected' : '' }}>
                                                Rejected
                                            </option>

                                            <option value="approved" {{ $boq->status == 'approved' ? 'selected' : '' }}>
                                                Approved
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="form-label fs-14" class="form-label fs-14 col-sm-3">
                                    Remark:
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea name="remarks" class="form-control">
                                            {{ $boq->remarks }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.select2').select2({
            width: '100%'
        });
    </script>
    <script>
        $(document).ready(function() {
            calculateTotal();
            $('.summernote').summernote({
                placeholder: 'Write Remark or Specifications:',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

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
                        $('#phone').val(data.phone);
                        $('#project_code').val(data.project_code);
                        $('#site_location').val(data.site_location);
                        $('#building_area').val(data.building_area);
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
