@extends('layouts.app')
@section('content')
    <div class="content">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Fixed Assets<span class="badge badge-soft-primary ms-2">123</span></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Assets</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Fixed Assets</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Header -->

        
        <!-- Leads Kanban -->
        <div class="d-flex overflow-x-auto align-items-start gap-3">
            <div class="kanban-list-items p-2 rounded border">
                <div class="card mb-0 border-0 shadow">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="d-flex align-items-center mb-1"><i
                                        class="ti ti-circle-filled fs-10 text-warning me-1"></i>Fixed Assets Category
                                </h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="dropdown table-action ms-2">
                                    <a href="#" class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#delete_lead"><i
                                                class="fa-regular fa-trash-can text-danger"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="kanban-list-items p-2 rounded border">
                <div class="card mb-0 border-0 shadow">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="d-flex align-items-center mb-1"><i
                                        class="ti ti-circle-filled fs-10 text-info me-1"></i>Fixed Assets Requests</h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="dropdown table-action ms-2">
                                    <a href="#" class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#delete_lead"><i
                                                class="fa-regular fa-trash-can text-danger"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="kanban-list-items p-2 rounded border">
                <div class="card mb-0 border-0 shadow">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="d-flex align-items-center mb-1"><i
                                        class="ti ti-circle-filled fs-10 text-success me-1"></i>Complete Requests
                                </h6>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="javascript:void(0);" class="text-info"><i class="ti ti-plus"></i></a>
                                <div class="dropdown table-action ms-2">
                                    <a href="#" class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item " href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#delete_lead"><i
                                                class="fa-regular fa-trash-can text-danger"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        <!-- /Leads Kanban -->

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
            <div class="d-flex align-items-center gap-2 flex-wrap">
            </div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                
                <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvas_add"><i class="ti ti-square-rounded-plus-filled me-1"></i>Add Fixed Assets</a>
            </div>
        </div>

    </div>
@endsection
