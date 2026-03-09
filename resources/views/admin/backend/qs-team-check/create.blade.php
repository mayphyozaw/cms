@extends('layouts.app')
@section('content')
    <h1>QS Team Check Create</h1>

    <div class="content d-flex flex-column flex-column-fluid">
        <div class="d-flex flex-column-fluid">
            <div class="container-fluid my-0">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Create Fixed Asset Requests</h4>
                    </div>
                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <a href="{{ route('engineer-requests.index') }}" class="btn btn-dark">Back</a>
                        </ol>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('qs.check.store') }}" method="post" enctype="multipart/form-data"
                            id="submit-form" class="assetsAdd">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        @foreach ($requestItemsCheck->engineerAssetRequestItems as $item)
                                            <div class="col-md-12 mb-3">
                                                <h5>Request Code - #{{ $item->engineerAssetRequest->request_code }}</h5>
                                                <span style="font-size: 15px;">Request Date : &nbsp;<i
                                                        style="font-weight: bold; color:#dc1212">{{ $item->engineerAssetRequest->request_date->format('Y-M-d h:i:s') }}</i></span>
                                                <br>
                                                <span style="font-size: 15px;">Workscope : &nbsp;&nbsp; <span
                                                        style="font-weight: bold; color:#086d6d">{{ $requestItemsCheck->workscope?->title ?? '-' }}</span></span>
                                                <br>
                                                <span style="font-size: 15px;">Project Code : &nbsp;&nbsp; <span
                                                        style="font-weight: bold; color:#086d6d">{{ $requestItemsCheck->project?->client->project_code ?? '-' }}</span></span>
                                                <br>
                                                <span style="font-size: 15px;">Site Location : &nbsp;&nbsp; <span
                                                        style="font-weight: bold; color:#086d6d">{{ $requestItemsCheck->project?->client->site_location ?? '-' }}</span></span>

                                            </div>
                                            <div>
                                                <table class="table table-striped table-bordered dataTable">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="text-center" style="background-color: #9dd2e7;">
                                                                #
                                                            </th>
                                                            <th class="text-center" style="background-color: #9dd2e7;">
                                                                Request Items
                                                            </th>
                                                            <th class="text-center" style="background-color: #9dd2e7;">
                                                                Request Qty
                                                            </th>
                                                            <th class="text-center" style="background-color: #9dd2e7;">
                                                                Warehouse Stock
                                                            </th>
                                                            <th class="text-center" style="background-color: #9dd2e7;">
                                                                Available
                                                            </th>
                                                            <th class="text-center" style="background-color: #9dd2e7;">
                                                                Pass(Qty)
                                                            </th>
                                                            <th class="text-center" style="background-color: #9dd2e7;">
                                                                Pass(Qty) - Entry
                                                            </th>
                                                            <th class="text-center" style="background-color: #9dd2e7;">
                                                                Status
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($requestItemsCheck->engineerAssetRequestItems as $item)
                                                            {{-- @php

                                                                $stock = $item->asset->warehouseStock->qty ?? 0;
                                                                $reserved = $item->asset->reservations->sum('qty');
                                                                $available = $stock - $reserved;

                                                            @endphp --}}

                                                            <tr class="text-center">
                                                                <td>{{ $loop->iteration }}.</td>
                                                                <td>{{ $item->asset->fixedAsset->name }}</td>

                                                                <td>{{ $item->quantity }}</td>

                                                                <td>stock</td>

                                                                <td>available</td>

                                                                <td>

                                                                    {{-- @if ($available <= 0)
                                                                        <input type="number" class="form-control" disabled
                                                                            value="0">
                                                                    @else
                                                                        <input type="number"
                                                                            name="items[{{ $item->id }}][passed_qty]"
                                                                            class="form-control" max="{{ $available }}">
                                                                    @endif --}}

                                                                </td>

                                                                <td>

                                                                    {{-- @if ($available <= 0)
                                                                        <span class="badge bg-danger">Out of Stock</span>
                                                                    @else
                                                                        <span class="badge bg-success">Available</span>
                                                                    @endif --}}

                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
