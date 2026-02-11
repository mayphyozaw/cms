@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Work Scope</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Work Scope</li>
                </ol>
            </nav>
        </div>


        <div class="row justify-content-center">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">Work Scope Information</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('projectmanage.workscope.update', $work_scope->id) }}" method="POST" id="submit-form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="form-label fs-14" class="form-label fs-14">
                                    Title:
                                </label>
                                <div class="input-group">
                                    <input type="text" name="title" class="form-control" value="{{$work_scope->title}}">
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


@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\WorkScope\WorkScopeUpdateRequest', '#submit-form') !!}
@endpush
