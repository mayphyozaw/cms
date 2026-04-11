@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Warehouse Stocks</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Stocks</li>
                </ol>
            </nav>
        </div>
        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Warehouse Stock Information</h5>
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
                    <table id="datatable"
                        class="table warehouseStockTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Asset type</th>
                                <th class="text-center" style="background-color: #9dd2e7">Asset name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Total quantity</th>
                                <th class="text-center" style="background-color: #9dd2e7">Total Passed quantity</th>
                                <th class="text-center" style="background-color: #9dd2e7">Stock balance</th>
                                <th class="text-center" style="background-color: #9dd2e7">Status</th>
                                <th class="text-center" style="background-color: #9dd2e7">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($warehouseStocks as $warehouseStock)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="text-center">
                                        {{ $warehouseStock->warehouse->name ?? '' }}
                                    </td>
                                    <td class="text-center">
                                        {{ $warehouseStock->asset->asset_type ?? '' }}
                                    </td>
                                    <td class="text-center">
                                        {{ $warehouseStock->asset->fixedAsset->name ?? ($warehouseStock->asset->variableAsset->name ?? '') }}
                                    </td>

                                    <td class="text-center">
                                        {{ $warehouseStock->quantity ?? 0 }}
                                    </td>
                                    <td class="text-center">
                                        {{ $warehouseStock->asset->total_passed_qty ?? 0 }}
                                    </td>

                                    <td class="text-center">
                                        {{ $warehouseStock->asset->stock_balance ?? 0 }}
                                    </td>
                                    @php
                                        $displayStatus = $warehouseStock->asset->status;
                                        if (
                                            in_array(strtolower($warehouseStock->asset->status), [
                                                'available',
                                                'active',
                                                'readytouse',
                                                'out of stock',
                                            ])
                                        ) {
                                            if ($warehouseStock->asset->stock_balance == 0) {
                                                
                                                $displayStatus = 'Active';
                                            } elseif ($warehouseStock->asset->stock_balance < 0) {
                                                
                                                $displayStatus = 'Out of Stock';

                                            } elseif ($warehouseStock->asset->stock_balance <= 10) {
                                                
                                                $displayStatus = 'Low Stock';
                                            } else {
                                                $displayStatus = 'Available';
                                            }
                                        }
                                    @endphp
                                    
                                    <td>
                                        @if ($warehouseStock->asset->stock_balance == 0)
                                            <span class="badge badge-soft-danger">{{ $displayStatus }}</span>
                                        @elseif($warehouseStock->asset->stock_balance < 0)
                                            <span class="badge badge-soft-danger">{{ $displayStatus }}</span>
                                        @elseif($warehouseStock->asset->stock_balance <= 10)
                                            <span class="badge badge-soft-warning">{{ $displayStatus }}</span>
                                        @else
                                            <span class="badge badge-soft-success">{{ $displayStatus }}</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('qs.passed.qty.detail') }}"
                                            class="btn btn-sm btn-info">
                                            Detail
                                        </a>
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
