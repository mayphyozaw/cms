@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        {{-- <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap"> --}}
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">

            <div>
                <h4 class="mb-1">All Assets<span class="badge badge-soft-primary ms-2">{{ $assets->count() }}</span></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Materials</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Assets</li>
                    </ol>
                </nav>
            </div>
        </div>

        {{-- <div class="d-flex overflow-x-auto align-items-start gap-3" style="padding-bottom:-10px;"> --}}
        <div class="d-flex overflow-x-auto align-items-start gap-3 pt-0 mt-0">

            <div class="kanban-list-items p-2 rounded border">
                <div class="card mb-0 border-0 shadow" style="background-color: #123b61">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="d-flex align-items-center mb-1"
                                    style="color: white;font-size:14px; !important;"><i
                                        class="ti ti-circle-filled fs-10 text-warning me-1"></i>
                                    Fixed Assets
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="dropdown table-action ms-2">

                                    <a href="#"
                                        class="topbar-link btn topbar-link dropdown-toggle drop-arrow-none btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false"
                                        aria-expanded="false">
                                        <i class="ti ti-bell-check fs-16 animate-ring"></i>
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                            {{ $fixedCount }}
                                        </span>
                                    </a>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

            <div class="kanban-list-items p-2 rounded border">
                <div class="card mb-0 border-0 shadow" style="background-color: #185285">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="d-flex align-items-center mb-1"
                                    style="color: white;font-size:14px; !important;"><i
                                        class="ti ti-circle-filled fs-10 text-warning me-1"></i>
                                    Variable Assets
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="dropdown table-action ms-2">
                                    <a href="#"
                                        class="topbar-link btn topbar-link dropdown-toggle drop-arrow-none btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false"
                                        aria-expanded="false">
                                        <i class="ti ti-bell-check fs-16 animate-ring"></i>
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                            {{ $variableCount }}
                                        </span>
                                    </a>

                                </div>
                            </div>



                        </div>
                    </div>
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
                        <x-create-button href="{{ route('material.assets.create') }}">
                            Create Assets
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
                    <table id="datatable"
                        class="table assetsTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Asset Type</th>
                                <th class="text-center" style="background-color: #9dd2e7">Warehouse Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Category Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Unit</th>
                                <th class="text-center" style="background-color: #9dd2e7">Total Qty</th>
                                <th class="text-center" style="background-color: #9dd2e7">Passed Qty</th>
                                <th class="text-center" style="background-color: #9dd2e7">Current Stock Balance</th>
                                <th class="text-center" style="background-color: #9dd2e7">Status</th>
                                <th class="text-center" style="background-color: #9dd2e7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assets as $asset)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $asset->asset_type }}</td>
                                    <td class="text-center">{{ $asset->warehouse->name }}</td>
                                    <td class="text-center">{{ $asset->fixedAsset->name ?? ($asset->variableAsset->name ?? '') }}</td>
                                    <td class="text-center">{{ $asset->category_name }}</td>
                                    <td class="text-center">{{ $asset->unit }}</td>
                                    <td class="text-center">{{ $asset->quantity }}</td>
                                    <td class="text-center">
                                        <a href="{{route('qs.passed.qty.detail')}}">
                                            <span style="color:red">{{ $asset->total_passed_qty }}</span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('warehouse-stocks.index')}}">
                                            {{ $asset->stock_balance }}
                                        </a>
                                        
                                    </td>
                                    @php
                                        
                                        $displayStatus = $asset->status;
                                        if (
                                            in_array(strtolower($asset->status), [
                                                'available',
                                                'active',
                                                'readytouse',
                                                'out of stock',
                                            ])
                                        ) {
                                            if ($asset->stock_balance == 0) {
                                                
                                                $displayStatus = 'Active';
                                            } elseif ($asset->stock_balance < 0) {
                                                
                                                $displayStatus = 'Out of Stock';

                                            } elseif ($asset->stock_balance <= 10) {
                                                
                                                $displayStatus = 'Low Stock';
                                            } else {
                                                $displayStatus = 'Available';
                                            }
                                        }
                                    @endphp
                                    
                                    <td>
                                        @if ($asset->stock_balance == 0)
                                            <span class="badge badge-soft-danger">{{ $displayStatus }}</span>
                                        @elseif($asset->stock_balance < 0)
                                            <span class="badge badge-soft-danger">{{ $displayStatus }}</span>
                                        @elseif($asset->stock_balance <= 10)
                                            <span class="badge badge-soft-warning">{{ $displayStatus }}</span>
                                        @else
                                            <span class="badge badge-soft-success">{{ $displayStatus }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('material.assets.destroy', $asset->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('purchase.index', $asset->id)}}" class="btn btn-sm btn-warning">Purchase</a>
                                            <a href="{{route('material.assets.edit', $asset->id)}}" class="btn btn-sm btn-icon btn-info"><i class="ti ti-edit"></i></a>
                                            <button type="buttom" class="btn btn-sm btn-icon btn-danger del_confirm">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
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

