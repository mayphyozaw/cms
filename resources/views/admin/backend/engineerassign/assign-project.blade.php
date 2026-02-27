@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">Engineer Assign Projects<span class="badge badge-soft-primary ms-2"></span></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Enigneers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Enigneer Assign Projects</li>
                    </ol>
                </nav>
            </div>
        </div>



        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Engineer Assign Project Information</h5>
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
                                <th class="text-center" style="background-color: #9dd2e7">Project Info</th>
                                <th class="text-center" style="background-color: #9dd2e7">Project Assigned Date</th>
                                <th class="text-center" style="background-color: #9dd2e7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->engineerAssigns as $assignProject)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $assignProject->project->client->project_code ?? '-' }} @
                                        {{ $assignProject->project->client->name ?? '-' }}</td>
                                    <td>{{ $assignProject->created_at->format('Y-m-d') }}</td>
                                    <td hidden>
                                        <a class="btn btn-info" href="{{ route('assign-edit', $assignProject->id) }}">
                                            Edit
                                        </a>
                                        <form action="{{ route('assign-destroy', $assignProject->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                    <td>
                                        <form action="{{ route('assign-destroy', $assignProject->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf

                                            <a class="btn btn-info"
                                                href="{{ route('assign-edit', $assignProject->id) }}">Edit</a>

                                            {{-- <a href="#" class="btn btn-danger del_confirm" id="confirm-text">
                                                Delete
                                            </a> --}}

                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure to delete?')">
                                                Delete
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
@endsection
