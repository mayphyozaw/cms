@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">
                    BOQ Details
                    <span class="badge badge-soft-primary ms-2"></span>
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">
                                Projects
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            BOQ Details
                        </li>
                    </ol>
                </nav>

            </div>
            <div class="gap-2 d-flex align-items-center flex-wrap">
                <div class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle btn btn-outline-light px-2 shadow"
                        data-bs-toggle="dropdown">
                        <i class="ti ti-package-export me-2"></i>
                        Export
                    </a>
                    <div class="dropdown-menu  dropdown-menu-end">
                        <ul>
                            <li>
                                {{-- <a href="{{ route('projectmanage.projects.boq-quantity-detail.exportPdf', [$project->id, $boq->id]) }}" class="dropdown-item">
                                    <i class="ti ti-file-type-pdf me-1"></i>
                                    Export as PDF
                                </a> --}}

                                 <a href="{{ route('projectmanage.projects.boq-quantity-detail.exportpdf', [$project->id, $boq->id]) }}"
                                    class="dropdown-item">
                                    <i class="ti ti-file-type-xls me-1"></i>
                                    Export as PDF
                                </a>
                            </li>
                            <li>
                                 
                                <a href="{{ route('projectmanage.projects.boq-quantity-detail.export', [$project->id, $boq->id]) }}"
                                    class="dropdown-item">
                                    <i class="ti ti-file-type-xls me-1"></i>
                                    Export as Excel
                                </a>
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
        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">
                            BILL OF QUANTITIES (BOQ) SUMMARY
                        </h5>
                    </div>
                    <div class="col-auto">
                        <x-create-button
                            href="{{ route('projectmanage.projects.boq-quantity-detail.create', [$project->id, $boq->id]) }}">
                            Create BOQ Details
                        </x-create-button>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-search d-flex align-items-center">
                    <div class="search-input">
                        <a href="javascript:void(0);" class="btn-searchset">
                            <i class="isax isax-search-normal fs-12"></i>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th width="10%" style="background-color: #9dd2e7">Item No</th>
                                <th style="background-color: #9dd2e7">Description</th>
                                <th width="15%" style="background-color: #9dd2e7">Unit</th>
                                <th width="15%" style="background-color: #9dd2e7">Qty</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($boqQtyDetails as $row)
                                @if ($row->type == 'section')
                                    <tr class="table-info">
                                        <td>
                                            <strong>{{ $row->item_no }}</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $row->title }}</strong>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $row->item_no }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->unit }}</td>
                                        <td class="text-end">
                                            {{ number_format($row->quantity, 2) }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
