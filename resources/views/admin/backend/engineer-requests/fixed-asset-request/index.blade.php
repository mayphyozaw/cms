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
                                        <a class="dropdown-item" href=""><i class="fa-solid fa-pencil text-blue"></i>
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
                        <x-create-button href="{{ route('fixed-asset-requests.create') }}">
                            Create Fixed Assets Requests
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
                        {{-- <tbody>
                            @foreach ($fixedAssets as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->project->client->project_code ?? '-' }} @
                                        {{ $item->project->client->name ?? '-' }}</td>
                                        <td>FR - 000001(Auto genereate code)</td>
                                        <td>{{ $item->request_date }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->workscope_id }}</td>
                                    <td>Request Item </td>
                                </tr>
                            @endforeach

                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
