@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Drawings Lists</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Project</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Drawing Lists</li>
                    </ol>
                </nav>
            </div>

        </div>

        <div class="card border-0">
            <div class="card-body pb-0 pt-0 px-2">
                <ul class="nav nav-tabs nav-bordered nav-bordered-primary">
                    <li class="nav-item me-3">
                        <a href="{{route('projectmanage.projects.drawings.index', $project->id)}}" class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.drawings.index') ? 'active' : '' }}">
                            <i class="ti ti-settings-cog me-2"></i>
                            Drawing Lists
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="{{route('projectmanage.projects.drawing-type.index',$project->id)}}" class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.drawing-type.index') ? 'active' : '' }}">
                            <i class="ti ti-device-laptop me-2"></i>
                            Drawing Types
                        </a>
                    </li>

                </ul>
            </div> <!-- end card body -->
        </div> <!-- end card -->

        <!-- start row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">

                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0">Drawing Lists</h5>
                            </div>

                            <div class="col-auto">
                                <x-create-button href="#">
                                    Create Drawings
                                </x-create-button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0">

                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="background-color: #9dd2e7">#</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Project Code</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Client Name</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Drawing Type</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Revision No</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Scale Ratio</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div> <!-- end card body -->
                </div> <!-- end card -->

            </div> <!-- end col -->

        </div>
        <!-- end row -->

    </div>
@endsection
