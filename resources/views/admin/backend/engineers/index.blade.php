@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">All Engineers<span class="badge badge-soft-primary ms-2"></span></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Enigneers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Enigneers</li>
                    </ol>
                </nav>
            </div>
        </div>



        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Engineers Information</h5>
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
                    <table class="table engineerTable table-bordered table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Engineer Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Project Code</th>
                                <th class="text-center" style="background-color: #9dd2e7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($engineers as $engineer)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $engineer->name }}</td>
                                    <td>
                                        @if ($engineer->engineerAssigns->count() > 0)
                                            @foreach ($engineer->engineerAssigns as $assign)
                                            <span class="badge bg-success">
                                                {{ $assign->project->client->project_code ?? 'No Project' }}
                                                <br>
                                            </span>
                                            @endforeach
                                        @else
                                            <span class="text-danger">No Project Assigned</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="#" method="POST" class="d-inline">
                                            @csrf


                                            <a href="{{ route('engineers.assign', $engineer->id) }}" class="btn  btn-sm"
                                                style="background-color: #1da0a3;"> <span style="color:#fafafa">Add
                                                    Project</span></a>

                                            <a href="" class="btn btn-sm btn-info">
                                                <span style="color:#fafafa">Manage</span>
                                            </a>
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
@endsection
