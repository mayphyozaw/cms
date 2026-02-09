@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Roles</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                </ol>
            </nav>
        </div>


        <div class="row">

            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Role Information</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('configuration.role.update', $role->id) }}" method="POST"
                            id="submit-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-lg-3 form-label">Role</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="name"
                                        value="{{$role->name}}">
                                    
                                </div>
                            </div>


                            <h5 class="card-title mb-0 py-3">Permissions</h5>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-3 col-6">
                                        <div class="mt-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    id="checkbox_{{ $permission->id }}" value="{{ $permission->name }}"
                                                     @if (in_array($permission->id, $old_permissions))
                                                            checked
                                                        @endif>
                                                <label class="form-check-label" for="checkbox_{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->



        </div>
    </div>
@endsection
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Role\RoleUpdateRequest', '#submit-form') !!}
@endpush
