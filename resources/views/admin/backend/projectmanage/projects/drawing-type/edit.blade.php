@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Drawings Type</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Project</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Drawing Types</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Drawing Types Information</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('projectmanage.projects.drawing-type.update', [$project->id, $drawing_type->id]) }}" method="POST" id="submit-form"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Name:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control" value="{{$drawing_type->name}}">
                                </div>
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
