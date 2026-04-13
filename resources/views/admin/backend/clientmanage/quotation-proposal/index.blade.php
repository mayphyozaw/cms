@extends('layouts.app')
@section('content')
    <div class="content pb-0">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Quotation Proposals</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Client</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quotation Proposal</li>
                    </ol>
                </nav>
            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <div class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-light px-2 shadow"
                        data-bs-toggle="dropdown"><i class="ti ti-package-export me-2"></i>Export</a>
                    <div class="dropdown-menu  dropdown-menu-end">
                        <ul>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"><i
                                        class="ti ti-file-type-pdf me-1"></i>Export as
                                    PDF</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item"><i
                                        class="ti ti-file-type-xls me-1"></i>Export as
                                    Excel </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                    <i class="ti ti-refresh"></i>
                </a>
                <a href="javascript:void(0);" class="btn btn-icon btn-outline-light shadow" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="Collapse" data-bs-original-title="Collapse" id="collapse-header">
                    <i class="ti ti-transition-top"></i>
                </a>
            </div>

        </div>
        <!-- End Page Header -->

        <!-- start row -->
        <div class="row">
            <div class="card border-0 rounded-0">
                <div class="card-header d-flex align-items-center justify-content-between gap-2 flex-wrap">
                    <div class="input-icon input-icon-start position-relative">
                        <span class="input-icon-addon text-dark"><i class="ti ti-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <h5 class="d-flex align-items-center mb-0">Quotation Proposals<span
                            class="badge bg-soft-dark ms-2 text-dark fs-12">2000 Proposals</span></h5>
                    <a href="{{ route('clientmanage.quototation-proposal.create') }}"
                        class="btn btn-md btn-primary d-flex align-items-center">
                        <i class="ti ti-circle-plus me-2"></i>
                        Add New Proposal
                    </a>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- start row -->
        <div class="row">

            <div class="col-sm-12">
                <div>
                    {{-- <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3">
                        <h5 class="d-flex align-items-center mb-0">Invoices<span
                                class="badge bg-soft-dark ms-2 text-dark fs-12">2000 Invoices</span></h5>
                        <a href="add-invoices.html" class="btn btn-md btn-primary d-flex align-items-center"><i
                                class="ti ti-circle-plus me-2"></i>Add Invoices</a>
                    </div> --}}
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-light px-2 shadow"
                                    data-bs-toggle="dropdown">All Proposals</a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">All Proposals</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Accepted</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Declined</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Draft</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Deleted</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-light px-2 shadow"
                                    data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort By</a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Newest</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Oldest</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="reportrange" class="reportrange-picker d-flex align-items-center shadow">
                                <i class="ti ti-calendar-due text-dark fs-14 me-1"></i><span
                                    class="reportrange-picker-field">9 Jun 25 - 9 Jun 25</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2 flex-wrap">

                            {{-- Manage Columns --}}
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="btn bg-soft-indigo px-2 border-0"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                                        class="ti ti-columns-3 me-2"></i>Manage Columns</a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-md p-3">
                                    <ul>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Subject</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Send To</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Total Value</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch">
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Date</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Open till</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Type</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Project</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-2">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Status</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="gap-1 d-flex align-items-center mb-0">
                                            <i class="ti ti-columns me-1"></i>
                                            <div class="form-check form-switch w-100 ps-0">

                                                <label class="form-check-label d-flex align-items-center gap-2 w-100">
                                                    <span>Action</span>
                                                    <input class="form-check-input switchCheckDefault ms-auto"
                                                        type="checkbox" role="switch" checked>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body p-0">

                        <!-- table header -->

                        <!-- Projects List -->
                        <div class="table-responsive table-nowrap custom-table">
                            <table id="estimations-table" class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th class="no-sort"></th>
                                        <th class="no-sort"></th>
                                        <th>Proposal ID</th>
                                        <th>Proposal Date</th>
                                        <th>Main WorkScope</th>
                                        <th>Client Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="text-end no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposalAllData as $proposal)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$proposal->proposalInvoice_no}}</td>
                                            <td>{{$proposal->proposal_date}}</td>
                                            <td>{{$proposal->main_subject}}</td>
                                            <td>{{$proposal->client->name}}</td>
                                            <td>{{$proposal->total_amount}}</td>
                                            <td><span class="badge badge-status bg-teal">{{$proposal->status}}</span>
                                            <td class="text-center">
                                            <div class="dropdown table-action">
                                                <a href="#"
                                                    class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvas_edit"><i
                                                            class="ti ti-edit text-blue"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#delete_estimations"><i class="ti ti-trash"></i>
                                                        Delete</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvas_view"><i
                                                            class="ti ti-clipboard-copy text-violet"></i> View
                                                        Estimation</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-checks text-green"></i> Mark as
                                                        Accepted</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-file"></i> Mark as Draft</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-sticker text-blue"></i> Mark as
                                                        Declined</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="ti ti-printer"></i> Print</a>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="datatable-length"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="datatable-paginate"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->

    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#estimations-table').DataTable({
                lengthChange: false, // hide "Show entries"
                searching: true, // enable search
                ordering: true, // enable arrows
                dom: 'lfrtip', // IMPORTANT: show search box
                columnDefs: [{
                        orderable: true,
                        targets: [0, 1, 7]
                    } // disable only needed columns
                ],
                dom: 'rtip'
            });
        });
    </script>
@endpush
