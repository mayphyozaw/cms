@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Measurement Categories Lists</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('projectmanage.projects.index')}}">Project</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categories Lists</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card border-0">
            <div class="card-body pb-0 pt-0 px-2">
                <ul class="nav nav-tabs nav-bordered nav-bordered-primary">
                    <li class="nav-item me-3">
                        <a href="{{ route('projectmanage.projects.drawing-measurements.index',$project->id) }}"
                            class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.drawing-measurements.index') ? 'active' : '' }}">
                            <i class="ti ti-settings-cog me-2"></i>
                            Drawing Measurement Lists
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="{{ route('projectmanage.projects.measurement-categories.index',$project->id) }}"
                            class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.measurement-categories.index') ? 'active' : '' }}">
                            <i class="ti ti-device-laptop me-2"></i>
                            Measurement Categories
                        </a>
                    </li>

                </ul>
            </div> 
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0">Measurement Categories</h5>
                            </div>

                            <div class="col-auto">
                                <x-create-button href="{{ route('projectmanage.projects.measurement-categories.create', $project->id) }}">
                                    Create Category
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
                                            <th class="text-center" style="background-color: #9dd2e7">Name</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Formula Type</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Symbol</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Formulas</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Unit</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $category->category_name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $category->formula_types }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $category->symbol }}
                                                </td>
                                                 <td class="text-center">
                                                    {{ $category->formulas }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $category->unit }}
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-icon btn-sm btn-info"
                                                        href="{{ route('projectmanage.projects.measurement-categories.edit', [$project->id, $category->id]) }}">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('projectmanage.projects.measurement-categories.destroy', [$project->id, $category->id]) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm btn-icon">
                                                            <i class="ti ti-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </div>
    </div>
@endsection
