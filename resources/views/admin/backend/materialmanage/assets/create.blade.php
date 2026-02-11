@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">All Assets</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">All Assets</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Assets</li>
                </ol>
            </nav>
        </div>


        <div class="row justify-content-center">

            <div class="col-lg-12 md-12">
                <div class="card border-0 rounded-0">

                    <div class="card-header">
                        <h5 class="card-title">Assets Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('material.assets.store') }}" method="POST" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="validationDefault01" class="form-label"> Warehouse </label>
                                    <select class="form-select" name="warehouse_id" id="example-select">
                                        <option value="" selected>Select Warehouses</option>
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}"> {{ $warehouse->name }} </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Asset Type</label>
                                    <select name="asset_type" id="asset_type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="fixedAsset">Fixed Asset</option>
                                        <option value="variableAsset">Variable Asset</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Asset Name</label>
                                    <select name="name" id="asset_id" class="form-control">
                                        <option value="">Select Asset</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    @php
                                        $selectedCategory = old('category_id');

                                        if (isset($asset)) {
                                            if ($asset->asset_type == 'fixedAsset') {
                                                $selectedCategory = optional($asset->fixedAsset)->category_id;
                                            } else {
                                                $selectedCategory = optional($asset->variableAsset)->category_id;
                                            }
                                        }
                                    @endphp
                                    <label class="form-label">
                                        Choose Asset Category</label>
                                    <select name="category_id" id="category_id" class="form-control form-select">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $selectedCategory == $item->id ? 'selected' : '' }}>
                                                {{ $item->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Unit</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-ruler"></i></div>
                                        <input type="text" class="form-control @error('unit') is-invalid @enderror"
                                            name="unit" placeholder="">
                                        @error('unit')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Total Quantity</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-brand-airtable"></i></div>
                                        <input type="text" name="quantity" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="formBasic">Status : <span
                                            class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control form-select">
                                        <option selected="">Select Status</option>
                                        <option value="available">Available</option>
                                        <option value="inUse">In Use</option>
                                        <option value="damaged">Damaged</option>
                                        <option value="disposed">Disposed</option>
                                        <option value="maintenance">Maintenance</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Remark:</label>
                                    <textarea name="remarks" class="form-control"></textarea>
                            </div>
                            </div>

                            <br>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Assets\AssetStoreRequest', '#submit-form') !!}

    <script>
        $('#asset_type').on('change', function() {
            let type = $(this).val();
            $('#asset_id').html('<option>Loading...</option>');

            if (type !== '') {

                $.ajax({
                    url: "{{ route('material.get-assets-by-type') }}",
                    type: "GET",
                    data: {
                        type: type
                    },
                    success: function(data) {

                        let options = '<option value="">Select Asset</option>';

                        data.forEach(function (asset) {
                            options += `<option value="${asset.id}">${asset.name}</option>`;

                        });

                        $('#asset_id').html(options);

                    }
                });

            } else {
                $('#asset_id').html('<option value="">Select Asset</option>');

            }
        });
        

        $('#asset_id').on('change', function() {

            let assetId = $(this).val();
            let type = $('#asset_type').val();

            if (assetId !== '') {

                $.ajax({
                    url: "{{ route('material.get-asset-detail') }}",
                    type: "GET",
                    data: {
                        asset_id: assetId,
                        type: type
                    },
                    success: function(response) {

                        // Auto select category
                        $('#category_id').val(response.category_id).trigger('change');

                    }
                });

            } else {
                $('#category_id').val('');
            }
        });
    </script>
@endpush
