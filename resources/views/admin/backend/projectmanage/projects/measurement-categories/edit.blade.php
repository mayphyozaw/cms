@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Categories</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('projectmanage.projects.site-measurements.index', $project->id) }}">Site
                                Measurement</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Measurement Categories</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Measurement Categories Information</h5>
                </div>

                <div class="card-body">
                    <form
                        action="{{ route('projectmanage.projects.measurement-categories.update', [$project->id, $category->id]) }}"
                        method="POST" id="submit-form" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Name:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="category_name" class="form-control"
                                        value="{{ $category->category_name }}">
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label fs-14">
                                    Formula Type:
                                </label>

                                <select name="formula_types" class="form-control form-select" id="formula_type">
                                    <option value="">Select Formula Type</option>

                                    
                                    <option value="volume" {{ $category->formula_type == 'volume' ? 'selected' : '' }}>
                                        Volume
                                    </option>

                                    <option value="area" {{ $category->formula_type == 'area' ? 'selected' : '' }}>
                                        Area
                                    </option>
                                    
                                    <option value="wall_area" {{ $category->formula_type == 'wall_area' ? 'selected' : '' }}>
                                        Wall Area
                                    </option>

                                    <option value="linear" {{ $category->formula_type == 'linear' ? 'selected' : '' }}>
                                        Linear
                                    </option>

                                    <option value="weight" {{ $category->formula_type == 'weight' ? 'selected' : '' }}>
                                        Weight
                                    </option>

                                    <option value="quantity" {{ $category->formula_type == 'quantity' ? 'selected' : '' }}>
                                        Quantity Only
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fs-14">
                                    Symbol:
                                </label>

                                <input type="text" name="symbol" id="symbol" class="form-control" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Unit: <span style="color:red;">*</span>
                                </label>
                                <select name="unit" id="unit" class="form-control form-select">
                                    <option value="">Select Unit</option>
                                    <option value="m3" {{ $category->unit == 'm3' ? 'selected' : '' }}>
                                        m&sup3;
                                    </option>
                                    <option value="ft3" {{ $category->unit == 'ft3' ? 'selected' : '' }}>
                                        ft&sup3;
                                    </option>
                                    <option value="m2" {{ $category->unit == 'm2' ? 'selected' : '' }}>
                                        m&sup2;
                                    </option>
                                    <option value="sqft" {{ $category->unit == 'sqft' ? 'selected' : '' }}>
                                        sqft
                                    </option>
                                    <option value="m" {{ $category->unit == 'm' ? 'selected' : '' }}>
                                        m
                                    </option>
                                    <option value="rft" {{ $category->unit == 'rft' ? 'selected' : '' }}>
                                        Rft
                                    </option>
                                     <option value="ton" {{ $category->unit == 'ton' ? 'selected' : '' }}>
                                        ton
                                    </option>
                                    <option value="kg" {{ $category->unit == 'kg' ? 'selected' : '' }}>
                                        kg
                                    </option>
                                    <option value="nos" {{ $category->unit == 'nos' ? 'selected' : '' }}>
                                        Nos
                                    </option>
                                </select>
                            </div>

                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('formula_type').addEventListener('change', function() {

            let symbol = '';

            if (this.value === 'volume') {
                symbol = 'V = L * W * H';
            } else if (this.value === 'area') {
                symbol = 'A = L * W';
            } else if (this.value === 'wall_area') {
                symbol = 'WallArea = L * H';
            } else if (this.value === 'linear') {
                symbol = 'L';
            }

            document.getElementById('symbol').value = symbol;
        });
    </script>
@endpush
