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
                    <form action="{{ route('projectmanage.projects.work-types.update', [$project->id, $workType->id]) }}"
                        method="POST" id="submit-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Name:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control" value="{{ $workType->name }}">
                                </div>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    Unit:
                                    <span style="color:red;">*</span>
                                </label>
                                <select name="unit" id="unit" class="form-control form-select">

                                    <option value="">Select Unit</option>

                                    <option value="m3" {{ $workType->unit == 'm3' ? 'selected' : '' }}>
                                        m&sup3;
                                    </option>

                                    <option value="m2" {{ $workType->unit == 'm2' ? 'selected' : '' }}>
                                        m&sup2;
                                    </option>

                                    <option value="kg" {{ $workType->unit == 'kg' ? 'selected' : '' }}>
                                        kg
                                    </option>

                                    <option value="m" {{ $workType->unit == 'm' ? 'selected' : '' }}>
                                        m
                                    </option>

                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    Measurement Type: <span style="color:red;">*</span>
                                </label>
                                <select name="measurement_type_id" id="measurement_type_id"
                                    class="form-control form-select">
                                    <option value="">Select Measurement Type</option>

                                    @foreach ($measurementTypes as $measurement_type)
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
