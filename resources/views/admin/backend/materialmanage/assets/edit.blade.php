@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">All Assets</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">All Assets</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Assets</li>
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
                        <form action="{{ route('material.assets.update', $asset->id) }}" method="POST" id="submit-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label for="validationDefault01" class="form-label"> Warehouse </label>
                                    <select class="form-select" name="warehouse_id" id="example-select">
                                        <option value="" selected>Select Warehouses</option>
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}"
                                                {{ old('warehouse_id', $asset->warehouse_id) == $warehouse->id ? 'selected' : '' }}>
                                                {{ $warehouse->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Asset Type</label>
                                    <select name="asset_type" id="asset_type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="fixedAsset"
                                            {{ $asset->asset_type === 'fixedAsset' ? 'selected' : '' }}>
                                            Fixed Asset</option>
                                        {{ $asset->asset_type === 'variableAsset' ? 'selected' : '' }}>
                                        Variable Asset</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Asset Name</label>
                                    <select name="asset_id" id="asset_id" class="form-control">
                                        <option value="">Select Asset</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="existing_asset_id" value="{{ $asset->id }}">


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">

                                    <label class="form-label">
                                        Choose Asset Category</label>
                                    @if ($asset->asset_type == 'fixedAsset')
                                        <select name="category_id" id="asset_category_id" class="form-control form-select">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{ $category->id === $category->id ? 'selected' : '' }}>
                                                    {{ $asset->fixedAsset->fixedCategory->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select name="category_id" id="asset_category_id" class="form-control form-select">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{ $category->id === $category->id ? 'selected' : '' }}>
                                                    {{ $asset->variableAsset->variableCategory->variable_category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif

                                </div>
                            </div>
                            <input type="hidden" id="existing_category_id"
                                value="{{ $asset->asset_type == 'fixedAsset'
                                    ? optional($asset->fixedAsset)->fixed_category_id
                                    : optional($asset->variableAsset)->variable_category_id }}">

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Unit</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-ruler"></i></div>
                                        <input type="text" class="form-control" name="unit"
                                            value="{{ $asset->unit }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">Total Quantity</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="ti ti-brand-airtable"></i></div>
                                        <input type="text" name="quantity" class="form-control"
                                            value="{{ $asset->quantity }}" readonly disable>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="formBasic">Status : <span
                                            class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control form-select">
                                        <option selected="">Select Status</option>
                                        <option value="active" {{ $asset->status === 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="available" {{ $asset->status === 'available' ? 'selected' : '' }}>
                                            Available (In Stock)
                                        </option>
                                        <option value="deployed" {{ $asset->status === 'deployed' ? 'selected' : '' }}>
                                            Deployed (On Site)
                                        </option>
                                        <option value="returned" {{ $asset->status === 'returned' ? 'selected' : '' }}>
                                            Returned
                                        </option>
                                        <option value="inspection" {{ $asset->status === 'inspection' ? 'selected' : '' }}>
                                            In-Inspection
                                        </option>
                                        <option value="maintenance"
                                            {{ $asset->status === 'maintenance' ? 'selected' : '' }}>
                                            Maintenance
                                        </option>
                                        <option value="damaged" {{ $asset->status === 'damaged' ? 'selected' : '' }}>
                                            Damaged
                                        </option>
                                        <option value="disposed" {{ $asset->status === 'disposed' ? 'selected' : '' }}>
                                            Disposed
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Remark:</label>
                                    <textarea name="remarks" class="form-control" value="{{ $asset->remarks }}"></textarea>
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
    {{-- {!! JsValidator::formRequest('App\Http\Requests\Assets\AssetStoreRequest', '#submit-form') !!} --}}

    <script>
        $(document).ready(function() {

            let initialType = $('#asset_type').val();
            let existingAssetId = $('#existing_asset_id').val();
            let existingCategoryId = $('#asset_category_id').val();

            if (initialType) {
                loadAssets(initialType, existingAssetId);
                loadCategories(initialType, existingCategoryId);
            }

            function loadAssets(type, selectedId) {
                if (!type) return;
                $.ajax({
                    url: "{{ route('material.get-assets-by-type') }}",
                    type: "GET",
                    data: {
                        type: type
                    },
                    success: function(data) {
                        let options = '<option value="">Select Asset</option>';
                        data.forEach(function(asset) {
                            let isSelected = (asset.id == selectedId) ? 'selected' : '';
                            options +=
                                `<option value="${asset.id}" ${isSelected}>${asset.name}</option>`;
                        });
                        $('#asset_id').html(options);
                    }
                });
            }


            function loadCategories(type, selectedId) {
                if (!type) return;
                $.ajax({
                    url: "{{ route('material.get-categories-by-type') }}",
                    type: "GET",
                    data: {
                        type: type
                    },
                    success: function(data) {
                        let options = '<option value="">Select Category</option>';
                        data.forEach(function(item) {
                            let isSelected = (item.id == selectedId) ? 'selected' : '';
                            options +=
                                `<option value="${item.id}" ${isSelected}>${item.category_name}</option>`;
                        });
                        $('#asset_category_id').html(options);
                    }
                });
            }

        });
    </script>
@endpush
