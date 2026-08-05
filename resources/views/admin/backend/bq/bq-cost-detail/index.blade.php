@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">
                    BOQ Cost Details
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
                            BOQ Cost Details
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
                            COST ESTIMATION SHEET (BOQ)
                        </h5>
                    </div>
                    <div class="col-auto">
                        <x-create-button
                            href="{{ route('projectmanage.projects.boq-cost-detail.create', [$project->id, $boq->id]) }}">
                            Create BOQ Cost Details
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
                    <table class="table table-bordered text-nowrap">
                        <thead>
                            <tr class="text-center">
                                <th width="10%" style="background-color: #9dd2e7">Item No</th>
                                <th style="background-color: #9dd2e7">Description</th>
                                <th style="background-color: #9dd2e7">Cost Category</th>
                                <th style="background-color: #9dd2e7">Material</th>
                                <th width="10%" style="background-color: #9dd2e7">Unit</th>
                                <th width="15%" style="background-color: #9dd2e7">Quantity</th>
                                <th width="15%" style="background-color: #9dd2e7">Unit Rate (MMK)</th>
                                <th width="15%" style="background-color: #9dd2e7">Amount (MMK)</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $currentSection = null;
                                $sectionTotal = 0;
                            @endphp

                            @foreach ($boqCostDetails as $index => $row)
                                @if ($row->type == 'section')
                                    {{-- Previous Section Total --}}
                                    @if ($currentSection !== null)
                                        <tr>
                                            <td colspan="7" class="text-end" style="background-color:#ddede7">
                                                <strong>{{ $currentSection->title }} Total</strong>
                                            </td>
                                            <td class="text-end" style="background-color:#ddede7">
                                                <strong>{{ number_format($sectionTotal, 2) }}</strong>
                                            </td>
                                        </tr>
                                    @endif

                                    @php
                                        $currentSection = $row;
                                        $sectionTotal = 0;
                                    @endphp

                                    <tr>
                                        <td style="background-color:#cceaf3">
                                            <strong>{{ $row->item_no }}</strong>
                                        </td>
                                        <td colspan="7" style="background-color:#cceaf3">
                                            <strong>{{ $row->title }}</strong>
                                        </td>
                                    </tr>
                                @else
                                    @php
                                        $sectionTotal += $row->amount;
                                    @endphp

                                    

                                    <tr>
                                        <td>{{ $row->item_no }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->boqCategory?->name }}</td>
                                        <td>{{ $row->requirement_name }}</td>
                                        <td class="text-center">{{ $row->unit }}</td>
                                        <td class="text-end">{{ number_format($row->quantity, 2) }}</td>
                                        <td class="text-end">{{ number_format($row->unit_rate, 2) }}</td>
                                        <td class="text-end">{{ number_format($row->amount, 2) }}</td>
                                    </tr>
                                @endif
                            @endforeach

                            {{-- Last Section Total --}}
                            @if ($currentSection)
                                <tr style="background-color:#c7dae1">
                                    <td class="text-end" colspan="7">
                                        <strong>{{ $currentSection->title }} Total</strong>
                                    </td>
                                    <td class="text-end">
                                        <strong>{{ number_format($sectionTotal, 2) }}</strong>
                                    </td>
                                </tr>
                            @endif

                            <tr class="table-success">
                                <td colspan="3" class="text-end">
                                    <strong>Grand Total</strong>
                                </td>

                                <td class="text-end" colspan="5">
                                    <strong>{{ number_format($grandTotal, 2) }}</strong>
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
