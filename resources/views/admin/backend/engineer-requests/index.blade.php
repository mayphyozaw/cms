@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">All Assets<span class="badge badge-soft-danger ms-2"></span></h4>
            </div>
        </div>

        <div class="d-flex overflow-x-auto align-items-start gap-3 pt-0 mt-0">

            <div class="kanban-list-items p-2">
                <div class="card mb-0 border-0 shadow" style="background-color: #459ba6;">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="d-flex align-items-center mb-1"
                                    style="color: white;font-size:14px; !important;"><i
                                        class="ti ti-circle-filled fs-10 text-warning me-1"></i>Fixed Assets Request
                                    {{-- <span
                                        class="badge rounded-pill
                                            bg-purple-gradient ms-2"></span> --}}
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="dropdown table-action ms-2">
                                    <a href="#" class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('engineer-requests.create') }}"><i
                                                class="fa-solid fa-pencil text-blue"></i>
                                            Create
                                        </a>

                                        {{-- <a class="dropdown-item" href="{{ route('material.category.store') }}"
                                            data-bs-toggle="modal" data-bs-target="#editModal"><i
                                                class="fa-solid fa-pencil text-blue"></i>
                                            Edit
                                        </a> --}}

                                        <a class="dropdown-item" href="">

                                            Show
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="kanban-drag-wrap">
                </div>

            </div>

            <div class="kanban-list-items p-2">
                <div class="card mb-0 border-0 shadow" style="background-color: #459ba6;">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="d-flex align-items-center mb-1"
                                    style="color: white;font-size:14px; !important;"><i
                                        class="ti ti-circle-filled fs-10 text-warning me-1"></i>Variable Assets Request

                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="dropdown table-action ms-2">
                                    <a href="#" class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('projectmanage.projects.create') }}">
                                            <i class="fa-solid fa-pencil text-blue">
                                            </i>
                                            Create
                                        </a>

                                        <a class="dropdown-item" href="{{ route('material.category.index') }}">
                                            Show
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="kanban-drag-wrap">
                </div>

            </div>


        </div>

        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Assets Information</h5>
                    </div>

                    <div class="col-auto">
                        <x-create-button href="{{ route('engineer-requests.create') }}">
                            Create Fixed Assets
                        </x-create-button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-search d-flex align-items-center">
                    <div class="search-input">
                        <a href="javascript:void(0);" class="btn-searchset"><i
                                class="isax isax-search-normal fs-12"></i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">Sl</th>
                                <th class="text-center" style="background-color: #9dd2e7">Engineer Request</th>
                                <th class="text-center" style="background-color: #9dd2e7">Request Code</th>
                                <th class="text-center" style="background-color: #9dd2e7">Request Date</th>
                                <th class="text-center" style="background-color: #9dd2e7">Request Item</th>
                                <th class="text-center" style="background-color: #9dd2e7">Accept / Reject</th>
                                <th class="text-center" style="background-color: #9dd2e7">QS Team Check & Pass</th>
                                <th class="text-center" style="background-color: #9dd2e7">Logistics Team Check & Sent</th>
                                <th class="text-center" style="background-color: #9dd2e7">Transferred From Warehouse</th>
                                <th class="text-center" style="background-color: #9dd2e7">Transferred To Warehouse </th>
                                <th class="text-center" style="background-color: #9dd2e7">Received Engineer</th>
                                <th class="text-center" style="background-color: #9dd2e7">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($engineerAssetRequests as $engineerAssetRequest)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $engineerAssetRequest->user->name }}</td>
                                    <td>{{ $engineerAssetRequest->request_code ?? '-' }}</td>
                                    <td>
                                        {{ $engineerAssetRequest->request_date?->format('Y-m-d h:i A') ?? '-' }}
                                        {{-- {{ \Carbon\Carbon::parse($engineerAssetRequest->request_date)->format('Y-m-d h:i A') }} --}}
                                        {{-- {{ $engineerAssetRequest->request_date?->format('d M Y h:i A') }} --}}
                                    </td>
                                    <td>
                                        <table class="table table-bordered table-sm mb-0">
                                            <thead>
                                                <tr>
                                                    <th style="background-color:#9dd2e7;width:80%;">Items</th>
                                                    <th style="background-color:#9dd2e7;width:20%;">Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($engineerAssetRequest->engineerAssetRequestItems as $requestItem)
                                                    <tr>
                                                        <td style="width:80%">
                                                            {{ $requestItem->asset->fixedAsset->name ?? '-' }}
                                                        </td>
                                                        <td style="width:20%">
                                                            {{ $requestItem->quantity ?? 0 }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>
                                        <div class="mt-2">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="status_{{ $engineerAssetRequest->id }}"
                                                    value="approved" class="form-check-input eng_status_change"
                                                    id="status_approved_{{ $engineerAssetRequest->id }}"
                                                    data-id="{{ $engineerAssetRequest->id }}">

                                                <label class="form-check-label"
                                                    for="status_approved_{{ $engineerAssetRequest->id }}">
                                                    Accept
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="status_{{ $engineerAssetRequest->id }}"
                                                    value="rejected" class="form-check-input eng_status_change"
                                                    id="status_reject_{{ $engineerAssetRequest->id }}"
                                                    data-id="{{ $engineerAssetRequest->id }}">

                                                <label class="form-check-label"
                                                    for="status_reject_{{ $engineerAssetRequest->id }}">
                                                    Reject
                                                </label>
                                            </div>
                                        </div>

                                        <div class="mt-2">
                                            <input name="remark" class="form-control" placeholder="Remark"
                                                id="remark_{{ $engineerAssetRequest->id }}">
                                        </div>
                                    </td>


                                    <td class="text-center" style="min-width:120px">
                                        {{-- @if ($hasFile)
                                            <i class="ti ti-check text-success">
                                                <span> Finished - </span>
                                                {{ \Carbon\Carbon::parse($project->project_file->uploaded_at)->format('Y-m-d H:i') }}
                                                {{ $project->project_file->uploaded_at }}
                                            </i>
                                        @else
                                            <i class="ti ti-x text-danger"></i>
                                        @endif --}}

                                        <small class="text-muted">
                                            <a href="{{route('qs.check.create', $engineerAssetRequest->id)}}" class="">
                                                <span class="d-flex justify-content-start">
                                                    No <span>&nbsp;&nbsp;</span>
                                                </span>
                                            </a>
                                        </small>

                                        <div class="progress" style="height:8px;">
                                            <div class="progress-bar" style="width: 100%;" role="progressbar"></div>
                                        </div>

                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on('change', '.eng_status_change', function() {

            let request_id = $(this).data('id');
            let status_value = $(this).val();

            $.ajax({
                url: "{{ route('engineer-requests.approval.store') }}",
                method: "POST",
                data: {
                    asset_request_id: request_id,
                    status_value: status_value,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // better debug
                    toastr.error("Something went wrong");
                }
            });

        });
    </script>
@endpush
