@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Work Type</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Project</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Work Types</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Work Types Information</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('projectmanage.projects.work-types.store', $project->id) }}" method="POST"
                        id="submit-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Name:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control"
                                        @error('name') is-invalid @enderror placeholder="Enter Name" required>
                                </div>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    Unit:
                                    <span style="color:red;">*</span>
                                </label>
                                <select name="unit" id="unit" class="form-control form-select">
                                    <option value="">Select Unit</option>
                                    <option value="m3"> m&sup3;</option>
                                    <option value="m2"> m&sup2;</option>
                                    <option value="kg"> kg</option>
                                    <option value="m"> m</option>

                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    Measurement Type: <span style="color:red;">*</span>
                                </label>
                                <select name="measurement_type_id" id="measurement_type_id"
                                    class="form-control form-select">
                                    <option value="">Select Measurement Type</option>

                                    @foreach ($measurement_types as $measurement_type)
                                        <option value="{{ $measurement_type->id }}">
                                            {{ $measurement_type->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    </div>

    </div>
@endsection
