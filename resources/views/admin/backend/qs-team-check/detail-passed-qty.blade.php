@extends('layouts.app')
@section('content')
    <h1>Detail Passed Qty</h1>

    <div class="content d-flex flex-column flex-column-fluid">
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid my-0">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <a href="{{ route('engineer-requests.index') }}" class="btn btn-dark">Back</a>
                        </ol>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">



                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Request Code</th>
                                    <th class="text-center">Request Date</th>
                                    <th class="text-center">Project Code</th>
                                    <th class="text-center">Work Scope</th>
                                    <th class="text-center">Request Items</th>
                                    <th class="text-center">Request Qty</th>
                                    <th class="text-center">Pass(Qty)</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php 
                                    $totalPassedQuantity = 0; 
                                    $totalRequestQuantity =0;
                                @endphp
                                @foreach ($requestItemsCheck as $requestItem)
                                    @foreach ($requestItem->engineerAssetRequestItems as $item)
                                        @php
                                            $assetTotalQty = $item->asset->quantity;
                                            $PassedQty = $item->passed_qty;
                                        @endphp
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>

                                            <td>
                                                <a href="{{route('purchase.index')}}">
                                                    {{ $requestItem->request_code }}
                                                </a>
                                            </td>

                                            <td>{{ $requestItem->request_date->format('Y-M-d h:i:s') }}</td>
                                           
                                            <td>{{ $requestItem->project?->client->project_code ?? '-' }}</td>

                                            <td>{{ $requestItem->workscope?->title ?? '-' }}</td>


                                            <td>{{ $item->asset->fixedAsset->name }}</td>

                                            <td>{{ $item->quantity }}</td>

                                            <td>{{ $item->passed_qty ?? 0 }}</td>

                                        </tr>
                                        
                                    @endforeach
                                    @php 
                                    $totalRequestQuantity += $item->quantity; 
                                    $totalPassedQuantity += $item->passed_qty; 
                                    @endphp
                                @endforeach
                                <tr>
                                            <td colspan="6" class="text-center">
                                                <span style="font-weight: bold;">Total</span>
                                            </td>
                                            <td class="text-center">{{$totalRequestQuantity}}</td>
                                            <td class="text-center">{{$totalPassedQuantity}}</td>
                                        </tr>
                            </tbody>

                        </table>


                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
