@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">All Projects<span class="badge badge-soft-primary ms-2">123</span></h4>
            </div>
        </div>



        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Projects Information</h5>
                    </div>

                    <div class="col-auto">
                        <x-create-button href="{{ route('projectmanage.projects.create') }}">
                            Create Project
                        </x-create-button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-search d-flex align-items-center">
                    <div class="search-input">
                        <a href="javascript:void(0);" class="btn-searchset"><i
                                class="isax isax-search-normal fs-12"></i></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive table-hover text-nowrap">

                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Customer Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Project Code</th>
                                <th class="text-center" style="background-color: #9dd2e7">Project Date</th>
                                @foreach ($project_categories as $item)
                                    <th class="text-center" style="background-color: #9dd2e7">{{ $item->title }}</th>
                                @endforeach
                                <th class="text-center" style="background-color: #9dd2e7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $project->client?->name }}</td>
                                    <td class="text-center">{{ $project->client->project_code }}</td>
                                    <td class="text-center">{{ $project->start_date }}</td>

                                    @foreach ($project_categories as $category)
                                        @php
                                            $progress = $project->getCategoryProgress($category->id);
                                            $color = $progress === 100 ? 'bg-success' : 'bg-danger';
                                        @endphp

                                        <td class="text-center" style="min-width:120px">
                                            <div class="progress" style="height:8px;">
                                                <div class="progress-bar {{ $color }}" style="width: 100%;"
                                                    role="progressbar">
                                                </div>
                                            </div>
                                            <i class="ti ti-x text-danger"></i>
                                            <small class="text-muted">
                                                <a href="javascript:void(0)" class="upload-file-modal text-primary"
                                                    data-bs-toggle="modal" data-bs-target="#upload-file-modal"
                                                    data-project="{{ $project->id }}" data-category="{{ $category->id }}">
                                                    Manage File
                                                </a>
                                            </small>
                                        </td>
                                    @endforeach

                                    <td class="text-center">
                                        Actions
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>
@endsection
@include('modals.upload-file-modal')
