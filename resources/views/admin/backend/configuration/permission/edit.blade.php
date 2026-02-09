@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Permission</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Permission</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
                </ol>
            </nav>
        </div>


        <div class="row">

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Permission </h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('configuration.permission.update', $permission->id) }}" method="POST"
                            id="submit-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                
                                <div class="col-lg-6">
                                    <label for="validationDefault01" class="form-label">Permission</label>
                                    <input type="text" class="form-control" name="name"
                                       value="{{ old('name', $permission->name) }}">
                                </div>


                                {{-- <h5 class="card-title mb-0 py-3">Permissions</h5> --}}
                                {{-- <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Permission Group</label>
                                    <select class="form-select" name="group_name" id="example-select">
                                        <option value="" selected>Select Group</option>
                                        <option value="Customer"> Customer </option>
                                        <option value="Supplier"> Supplier </option>
                                        <option value="WareHouse"> WareHouse </option>
                                        <option value="Engineer"> Engineer </option>
                                        <option value="Project"> Project </option>
                                        <option value="Materaials"> Materaials </option>
                                        <option value="HR"> HR </option>
                                        <option value="FileManager"> FileManager </option>
                                        <option value="StockManage"> Stock Management</option>
                                        <option value="Report"> Report </option>
                                        <option value="Role"> Roles</option>
                                        <option value="Permission"> Permission</option>
                                        <option value="RolesInPermission"> Roles In Permission</option>

                                    </select>
                                </div> --}}

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->



        </div>
    </div>
@endsection
@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Permission\PermissionUpdateRequest', '#submit-form') !!}
@endpush
