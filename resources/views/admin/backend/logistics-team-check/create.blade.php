@extends('layouts.app')
@section('content')
    <h1>Logistics Team Check Create</h1>

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
                        <form action="{{ route('logistics.check.store') }}" method="post" id="submit-form">
                            @csrf
                            <input type="hidden" name="request_id" value="{{ $requestItemsCheck->id }}">
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
                            <hr>
                            <h6>Transfer Information</h6>
                            <br>

                            <div class="col-md-12 ">
                                @foreach ($items as $item)
                                        <div class="item-request-group mb-4 p-3">
                                            <hr>
                                            <div class="row py-2">
                                                <label class="col-lg-2 form-label">Transfer From</label>
                                                <div class="col-lg-9">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio"
                                                            name="items[{{ $item->id }}][transfer_from]"
                                                            value="warehouse" class="form-check-input eng_status_change"
                                                            data-id="{{ $item->id }}"
                                                            id="status_transfer_warehouse_{{ $item->id }}">
                                                        <label class="form-check-label"
                                                            for="status_transfer_warehouse_{{ $item->id }}">
                                                            Transfer From Warehouse
                                                        </label>
                                                    </div>


                                                    <div class="form-check form-check-inline">
                                                        <input type="radio"
                                                            name="items[{{ $item->id }}][transfer_from]"
                                                            value="project" class="form-check-input eng_status_change"
                                                            data-id="{{ $item->id }}"
                                                            id="status_transfer_site_{{ $item->id }}">
                                                        <label class="form-check-label"
                                                            for="status_transfer_site_{{ $item->id }}">Transfer
                                                            From Sites</label>
                                                    </div>

                                                    <div class="row py-2">
                                                            <div id="selectBox_{{ $item->id }}"
                                                                style="display:none; margin-top:10px;" class="mt-2 col-md-9">
                                                                <select class="form-control" data-choices
                                                                    name="items[{{ $item->id }}][transfer_from_warehouse_id]">
                                                                    <option value="">--- Select Transfer From Warehouse
                                                                        ---
                                                                    </option>
                                                                    @foreach ($warehouses as $warehouse)
                                                                        <option value="{{ $warehouse->id }}">
                                                                            {{ $warehouse->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div id="selectBox_site_{{ $item->id }}"
                                                                style="display:none; margin-top:10px;" class="mt-2 col-md-9">
                                                                <select class="form-control" data-choices
                                                                    name="items[{{ $item->id }}][transfer_from_project_id]">
                                                                    <option value="">--- Select Transfer From Site ---
                                                                    </option>
                                                                    @foreach ($projects as $project)
                                                                        <option value="{{ $project->id }}">
                                                                            {{ $project->project_code }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row py-2">
                                                <label class="col-lg-2 form-label">Transfer To</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control"
                                                        value="{{ $requestItemsCheck->project?->client->project_code ?? '-' }}"
                                                        readonly disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h6>Sending Information</h6>
                                        <br>
                                        <div class="row py-2">
                                            <label class="col-lg-2 form-label">Transfer Date</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="items[{{ $item->id }}][sent_date]"
                                                    class="form-control datetimepicker" placeholder="Select date"
                                                    value="{{ now()->format('Y-m-d H:i:s') }}" readonly>
                                                {{-- <input type="text" class="form-control date-picker"
                                            value="{{ now()->format('Y-m-d H:i:s') }}" readonly> --}}

                                            </div>
                                        </div>

                                        <div class="row py-2">
                                            <label class="col-lg-2 form-label">Remark</label>
                                            <div class="col-lg-9">
                                                <textarea name="items[{{ $item->id }}][remark]" class="form-control"></textarea>
                                            </div>

                                        </div>
                                @endforeach
                            </div>
                            
                            <div class="py-3">
                                <button class="btn btn-info btn-sm" type="submit">
                                    Save</button>
                                <button class="btn btn-success btn-sm" type="button">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on('change', '.eng_status_change', function() {
            let id = $(this).data('id');
            let value = $(this).val();


            let warehouseBox = $('#selectBox_' + id);
            let siteBox = $('#selectBox_site_' + id);

            warehouseBox.hide();
            siteBox.hide();

            if (value === 'warehouse') {
                warehouseBox.show();
            } else if (value === 'project') {
                siteBox.show();
            }
        });
    </script>
@endpush
