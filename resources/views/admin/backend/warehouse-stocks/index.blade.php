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

            {{-- <div class="card-header">
                <h5 class="card-title">Customer Information</h5>
            </div> --}}
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
                        <a href="javascript:void(0);" class="btn-searchset"><i
                                class="isax isax-search-normal fs-12"></i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable"
                        class="table warehouseStockTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Asset Type</th>
                                <th class="text-center" style="background-color: #9dd2e7">Asset Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Total Quantity</th>
                                <th class="text-center" style="background-color: #9dd2e7">Stock Balance</th>
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

                                    <td class="text-center">{{ $warehouseStock->quantity ?? 0 }}</td>

                                    <td class="text-center">{{ $warehouseStock->stock_balance ?? 0 }}</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-sm btn-info">View</a>
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
