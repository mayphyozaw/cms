@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Mix Ratio Detail</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('projectmanage.projects.index') }}">Project</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Mix Ratio Detail
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
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.mixRatio.index') ? 'active' : '' }}">
                                    <i class="ti ti-settings-cog me-2"></i>
                                    Mix Ratio
                                </a>
                            </li>
                            <li class="nav-item me-3">
                                <a href="{{ route('projectmanage.projects.mixRatio-details.index', $project->id) }}"
                                    class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.mixRatio-details.*') ? 'active' : '' }}">
                                    <i class="ti ti-settings-cog me-2"></i>
                                    Mix Ratio Detail
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Mix Ratio Detail Information</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('projectmanage.projects.mixRatio-details.store', $project->id) }}" method="POST"
                        id="submit-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            
                            {{-- <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Mix Ratio Template Code:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="mix_ratio_template_id" class="form-control">

                                </div>
                            </div> --}}


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Mix Ratio Template Code:
                                    </label>
                                    <select name="mix_ratio_template_id" id="mix_ratio_template_id" class="form-control form-select">
                                        <option value="">Select Code</option>
                                        @foreach ($mixRatios as $mixRatio)
                                            <option value="{{ $mixRatio->id }}">{{ $mixRatio->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Material:
                                    </label>
                                    <select name="variable_asset_id" id="variable_asset_id" class="form-control form-select">
                                        <option value="">Select Material</option>
                                        @foreach ($varilableAssets as $varilableAsset)
                                            <option value="{{ $varilableAsset->id }}">{{ $varilableAsset->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Part:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="part" class="form-control" value="1">
                                </div>
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
