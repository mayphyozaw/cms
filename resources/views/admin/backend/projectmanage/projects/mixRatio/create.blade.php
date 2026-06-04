@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Mix Ratio</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Mix Ratio
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="card border-0">

                    <div class="card-body pb-0 pt-0 px-2">

                        <ul class="nav nav-tabs nav-bordered nav-bordered-primary">

                            <li class="nav-item me-3">
                                <a href="{{ route('projectmanage.projects.mixRatio.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.mixRatio.*') ? 'active' : '' }}">
                                    <i class="ti ti-settings-cog me-2"></i>
                                    Mix Ratio
                                </a>
                            </li>
                            <li class="nav-item me-3">
                                <a href="{{ route('projectmanage.projects.mixRatio-details.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.mixRatio-details.index') ? 'active' : '' }}">
                                    <i class="ti ti-settings-cog me-2"></i>
                                    Mix Ratio Detail
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Mix Ratio Information</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('projectmanage.projects.mixRatio.store', $project->id) }}" method="POST"
                        id="submit-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3" hidden>
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Code:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="code" class="form-control" value="Auto Generate">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Ratio Name:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="ratio_name" class="form-control">

                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Ratio Type:
                                </label>
                                <select name="ratio_type" class="form-control form-select">
                                    <option value="">Select Scale Ratio</option>
                                    <option value='concrete'> Concrete</option>
                                    <option value='motor'>Motor</option>
                                    <option value='plaster'>Plaster</option>
                                    <option value='screed'> Screed</option>
                                </select>

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Dry Volume Factor:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="dry_volume_factor" class="form-control" value="1.54">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Status:
                                </label>
                                <select name="status" class="form-control form-select">
                                    <option value="">Select Status</option>
                                    <option value='is_active'> Active</option>
                                    <option value='pending'>Pending</option>
                                </select>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Descriptions:
                                </label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>

                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\MixRatioDetails\MixRatioDetailStoreRequest', '#submit-form') !!}
@endpush
