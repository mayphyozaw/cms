@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">All Projects<span class="badge badge-soft-primary ms-2">123</span></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Projects</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Developer Projects</li>
                    </ol>
                </nav>
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
                    </table>
                </div>
            </div>

        </div>


    </div>
@endsection
