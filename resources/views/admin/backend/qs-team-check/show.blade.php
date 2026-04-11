@extends('layouts.app')
@section('content')
    <h1>QS Team Check Create</h1>

    <div class="content d-flex flex-column flex-column-fluid">
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid my-0">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        {{-- <h4 class="fs-18 fw-semibold m-0">Create Fixed Asset Requests</h4> --}}
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <a href="{{ route('engineer-requests.index') }}" class="btn btn-dark">Back</a>
                        </ol>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <h5>Request Code - #{{ $requestItemsCheck->request_code }}</h5>

                            <span>Request Date :
                                <b style="color:#dc1212">
                                    {{ $requestItemsCheck->request_date->format('Y-M-d h:i:s') }}
                                </b>
                            </span><br>

                            <span>Workscope :
                                <b style="color:#086d6d">
                                    {{ $requestItemsCheck->workscope?->title ?? '-' }}
                                </b>
                            </span><br>

                            <span>Project Code :
                                <b style="color:#086d6d">
                                    {{ $requestItemsCheck->project?->client->project_code ?? '-' }}
                                </b>
                            </span><br>

                            <span>Site Location :
                                <b style="color:#086d6d">
                                    {{ $requestItemsCheck->project?->client->site_location ?? '-' }}
                                </b>
                            </span>
                        </div>


                        @php
                            $totalRequestQty = $requestItemsCheck->engineerAssetRequestItems->sum('quantity');

                            $totalPassedQty = $requestItemsCheck->engineerAssetRequestItems->sum(function ($item) {
                                return $item->passed_qty ?? 0;
                            });
                        @endphp


                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Request Items</th>
                                    <th class="text-center">Request Qty</th>
                                    <th class="text-center">Stock Status</th>
                                    {{-- <th class="text-center">Warehouse Stock</th> --}}
                                    <th class="text-center">Pass(Qty)</th>
                                    {{-- <th class="text-center">Warehouse Stock Balance</th> --}}
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($requestItemsCheck->engineerAssetRequestItems as $item)
                                    @php
                                        $warehouseTotalquantity = $item->asset->quantity;
                                        $warehousePassedQty = $item->passed_qty;
                                        $warehouseBalancequantity  = $warehouseTotalquantity - $warehousePassedQty;
                                        $warehouseTotalQuantity = $warehouseBalancequantity;
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $item->asset->fixedAsset->name }}</td>

                                        <td>{{ $item->quantity }}</td>

                                        <td>
                                            @if ($item->asset->quantity <= 0)
                                                <span class="badge bg-danger">Out of Stock</span>
                                            @else
                                                <span class="badge bg-success">Available</span>
                                            @endif
                                        </td>

                                        {{-- <td>{{ $item->asset->quantity }}</td> --}}

                                        <td>{{ $item->passed_qty ?? 0 }}</td>

                                        {{-- <td>
                                            <span class="badge bg-info">{{ $warehouseTotalQuantity }}</span>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>


                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
