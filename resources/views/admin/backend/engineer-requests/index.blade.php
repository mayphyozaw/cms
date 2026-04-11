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
                                    <a href="#"
                                        class="topbar-link btn topbar-link dropdown-toggle drop-arrow-none btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false"
                                        aria-expanded="false">
                                        <i class="ti ti-bell-check fs-16 animate-ring"></i>
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                            {{$fixedCount}}
                                        </span>
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

                                        <a class="dropdown-item" href="{{ route('fixed-asset-request.index') }}">

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
                                        <a class="dropdown-item"
                                            href="{{ route('engineer-variable-asset-request.create') }}">
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

                    <div class="col-auto" hidden>
                        <x-create-button href="{{ route('engineer-requests.create') }}">
                            Create Fixed Assets
                        </x-create-button>
                    </div>
                    <div class="col-auto" hidden>
                        <x-create-button href="{{ route('engineer-requests.create') }}">
                            Create Variable Assets
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
                                <th class="text-center" style="background-color: #9dd2e7">Transferred From</th>
                                <th class="text-center" style="background-color: #9dd2e7">Transferred To </th>
                                <th class="text-center" style="background-color: #9dd2e7">Received Engineer</th>
                                <th class="text-center" style="background-color: #9dd2e7">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($engineerAssetRequests as $engineerAssetRequest)
                                @php
                                    $items = $engineerAssetRequest->engineerAssetRequestItems;

                                    $item = $engineerAssetRequest->engineerAssetRequestItems->first();

                                    $total = $items->count();

                                    $totalPassedQty = $items->sum('passed_qty');

                                    $checked = $items->whereNotNull('checked_at')->count();

                                    $firstChecked = $items->firstWhere('checked_at', '!=', null);

                                    $checkedCount = $items->whereNotNull('checked_at')->count();

                                    // $isFinihed = $engineerAssetRequest->qs_checked_status === 'finished';
                                    $isLogisticsFinihed = $engineerAssetRequest->qs_checked_status === 'finished';

                                @endphp

                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $engineerAssetRequest->user->name }}
                                    </td>

                                    <td>
                                        {{ $engineerAssetRequest->request_code ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $engineerAssetRequest->request_date?->format('Y-m-d h:i A') ?? '-' }}
                                    </td>

                                    <td>
                                        <table class="table table-bordered table-responsive text-nowrap" style="width:100%;">
                                            <tbody>
                                                <tr>
                                                    <td style="background-color: #459ba6; color:white;">
                                                        Item
                                                    </td>
                                                    <td style="background-color: #459ba6; color:white;">
                                                        Qty
                                                    </td>
                                                </tr>
                                                @foreach ($items as $item)
                                                    <tr>
                                                        <td>{{ $item->asset->fixedAsset->name ?? '-' }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>



                                    <td id="progress_{{ $engineerAssetRequest->id }}" hidden>
                                        @php
                                            $status = $engineerAssetRequest->status;
                                        @endphp

                                        @if ($status === 'approved')
                                            <div class="text-center">
                                                <span class="badge bg-success mb-1">Accepted</span>
                                                <div class="progress" style="height:8px;">
                                                    <div class="progress-bar bg-success" style="width:100%"></div>
                                                </div>
                                                <small
                                                    class="text-muted d-block">{{ $engineerAssetRequest->remark }}</small>
                                            </div>
                                        @elseif($status === 'rejected')
                                            <div class="text-center">
                                                <span class="badge bg-danger mb-1">Rejected</span>
                                                <div class="progress" style="height:8px;">
                                                    <div class="progress-bar bg-danger" style="width:100%"></div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="status_{{ $engineerAssetRequest->id }}"
                                                    value="approved" class="form-check-input eng_status_change"
                                                    data-id="{{ $engineerAssetRequest->id }}">
                                                <label>Accept</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="status_{{ $engineerAssetRequest->id }}"
                                                    value="rejected" class="form-check-input eng_status_change"
                                                    data-id="{{ $engineerAssetRequest->id }}">
                                                <label>Reject</label>
                                            </div>

                                            <input type="text" class="form-control mt-1" placeholder="Remark"
                                                id="remark_{{ $engineerAssetRequest->id }}">
                                        @endif
                                    </td>

                                    <td id="progress_{{ $engineerAssetRequest->id }}">
                                        @if ($engineerAssetRequest->status)
                                            <div class="text-center">
                                                @if ($engineerAssetRequest->status === 'approved')
                                                    <span class="badge bg-success mb-1"
                                                        style="padding: 6px 12px; font-size: 13px;">Accepted</span>
                                                    <div class="progress mt-1" style="height:8px;">
                                                        <div class="progress-bar bg-success" style="width:100%"></div>
                                                    </div>
                                                @else
                                                    <span class="badge bg-danger mb-1"
                                                        style="padding: 6px 12px; font-size: 13px;">Rejected</span>
                                                    <div class="progress mt-1" style="height:8px;">
                                                        <div class="progress-bar bg-danger" style="width:100%"></div>
                                                    </div>
                                                @endif
                                                @if ($engineerAssetRequest->remark)
                                                    <small
                                                        class="text-muted d-block mt-1">{{ $engineerAssetRequest->remark }}</small>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="status_{{ $engineerAssetRequest->id }}"
                                                    value="approved" class="form-check-input eng_status_change"
                                                    data-id="{{ $engineerAssetRequest->id }}">
                                                <label>Accept</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="status_{{ $engineerAssetRequest->id }}"
                                                    value="rejected" class="form-check-input eng_status_change"
                                                    data-id="{{ $engineerAssetRequest->id }}">
                                                <label>Reject</label>
                                            </div>

                                            <input type="text" class="form-control mt-1" placeholder="Remark"
                                                id="remark_{{ $engineerAssetRequest->id }}">
                                        @endif
                                    </td>


                                    <td class="text-center qs-bar-container-{{ $engineerAssetRequest->id }}"
                                        style="min-width:150px">
                                        @php

                                            $isFinished =
                                                ($checked === $total && $total > 0) ||
                                                $engineerAssetRequest->status === 'approved';
                                        @endphp

                                        @if ($isFinished)
                                            <div class="text-success">
                                                <i class="ti ti-check text-success"></i>
                                                <a
                                                    href="{{ route('qs.check.detail', ['asset_id' => $engineerAssetRequest->id]) }}">Finished</a>
                                            </div>
                                            <div class="progress mt-1" style="height:8px;">
                                                <div class="progress-bar bg-success" style="width:100%"></div>
                                            </div>
                                        @else
                                            <div class="progress" style="height:8px;">
                                                <div class="progress-bar bg-danger" style="width:100%"></div>
                                            </div>
                                            <small>
                                                <a href="{{ route('qs.check.create', $engineerAssetRequest->id) }}">
                                                    No ({{ $checked }}/{{ $total }})
                                                </a>
                                            </small>
                                        @endif
                                    </td>

                                    <td class="text-center logistics-bar-container-{{ $engineerAssetRequest->id }}"
                                        style="min-width:150px">

                                        {{-- @php
                                            $logisticsFinished = ($totalPassedQty != 0 && $total > 0 );
                                        @endphp --}}

                                        @if ($isLogisticsFinihed = $engineerAssetRequest->logistics_checked_status === 'finished')
                                            <div class="text-success">
                                                <i class="ti ti-check text-success"></i>
                                                <a href="#">Finished</a>
                                            </div>
                                            <div class="progress mt-1" style="height:8px;">
                                                <div class="progress-bar bg-success" style="width:100%"></div>
                                            </div>
                                        @else
                                            <div class="progress" style="height:8px;">
                                                <div class="progress-bar bg-danger" style="width:100%"></div>
                                            </div>
                                            <small>
                                                <a
                                                    href="{{ route('logistics.check.create', $engineerAssetRequest->id) }}">
                                                    Pending / No Check
                                                </a>
                                            </small>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->transfer_from_warehouse_id)
                                            {{ $item->warehouse->name ?? '' }}
                                        @else
                                            {{ $item->project->project_code ?? '' }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $engineerAssetRequest->project->client->project_code ?? '' }}
                                    </td>
                                    <td></td>
                                    <td>

                                    </td>
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
            let id = $(this).data('id');
            let status = $(this).val();
            let remark = $('#remark_' + id).val();

            $.ajax({
                url: "{{ route('engineer-requests.approval.store') }}",
                method: "POST",
                data: {
                    asset_request_id: id,
                    status_value: status,
                    remark: remark,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    toastr.success(res.message);

                    // Create the Badge HTML
                    let color = (status === 'approved') ? 'success' : 'danger';
                    let text = (status === 'approved') ? 'Accepted' : 'Rejected';

                    let badgeHtml = `
                <div class="text-center">
                    <span class="badge bg-${color} mb-1" style="padding: 6px 12px; font-size: 13px;">${text}</span>
                    <div class="progress mt-1" style="height:8px;">
                        <div class="progress-bar bg-${color}" style="width:100%"></div>
                    </div>
                </div>`;

                    // Replace ONLY the Accept/Reject cell
                    // We do NOT touch the .qs-bar-container here anymore
                    $('#progress_' + id).html(badgeHtml);
                },
                error: function() {
                    toastr.error("Error updating status");
                }
            });
        });
    </script>
@endpush
