@extends('layouts.app')
@section('content')
    <div class="content pb-0">

        <!-- Start Page Header -->
        <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2 mb-3">
            <div class="flex-grow-1">
                <h6 class="fw-bold mb-0 d-flex align-items-center">
                    <a href="{{ route('projectmanage.projects.index', $project->id) }}">
                        <i class="ti ti-chevron-left me-1 fs-14"></i>
                        Project
                    </a>
                </h6>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="card rounded-0 mb-0">
            <div class="card-header">
                <h6 class="fw-bold m-0"> Measurement Categories </h6>
            </div> <!-- end card-header -->


            <div class="card-body">
                <form action="{{ route('projectmanage.projects.measurement-categories.store', $project->id) }}"
                    method="POST" id="submit-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-12 mb-3">
                            <div class="col-lg-6 col-md-3 col-sm-12">
                                <div class="mb-3">
                                    <label for="form-label fs-14" class="form-label fs-14">
                                        Name:
                                    </label>
                                    <div class="input-group">
                                        <input type="text" name="category_name" class="form-control"
                                            @error('category_name') is-invalid @enderror placeholder="Enter Name" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-3 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">
                                        Formula Type:
                                    </label>

                                    <select name="formula_types" class="form-control form-select" id="formula_type">
                                        <option value="">Select Formula Type</option>

                                        <option value="volume">
                                            Volume
                                        </option>

                                        <option value="area">
                                            Area
                                        </option>

                                        <option value="wall_area">
                                            Wall Area
                                        </option>

                                        <option value="linear">
                                            Linear
                                        </option>

                                        <option value="weight">
                                            Weight
                                        </option>

                                        <option value="quantity">
                                            Quantity Only
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label fs-14">
                                        Symbol:
                                    </label>

                                    <input type="text" name="symbol" id="symbol" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Unit: <span style="color:red;">*</span>
                                    </label>
                                    <select name="unit" id="unit" class="form-select">

                                        <option value="">Select Unit</option>

                                        <!-- Volume -->
                                        <option value="m3">m³</option>
                                        <option value="ft3">ft³</option>
                                        {{-- Ara --}}
                                        <option value="m2">m²</option>
                                        <option value="sqft">sqft</option>
                                        <!-- Length -->
                                        <option value="m">m</option>
                                        <option value="rft">Rft</option>
                                        <!-- Weight -->
                                        <option value="ton">ton</option>
                                        <option value="kg">kg</option>
                                        <option value="nos">Nos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2 align-items-center justify-content-start mb-0">
                        <button type="button" class="btn btn-light">Cancel</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
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
            } else if (this.value === 'weight') {
                symbol = 'W = L * Unit Weight';
            }

            document.getElementById('symbol').value = symbol;
        });
    </script>
@endpush
