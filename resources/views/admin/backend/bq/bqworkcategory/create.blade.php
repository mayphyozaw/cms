@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">
                BQ Work Category
            </h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Create BQ Work Category
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row justify-content-center">
            <div class="card border-0 rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        BQ Work Categroy Information
                    </h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('bq.bqworkcategory.store') }}" method="POST" id="submit-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Work Scope
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="work_scope_id" id="work_scope_id"
                                            class="form-control select2">
                                            <option value="">
                                                Select Work Scope
                                            </option>

                                            @foreach ($workscopes as $workscope)
                                                <option value="{{ $workscope->id }}">
                                                    {{ $workscope->title }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                   BQ Work Types
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select name="boq_work_types" class="form-control select2">
                                        <option value="">Select BQ Work Types</option>
                                        <option value="Civil Works">Civil Works</option>
                                        <option value="Finishing Works">Finishing Works</option>
                                        <option value="MEP Works">MEP Works</option>
                                    </select>
                                    </div>
                                </div>
                            </div>

                             <div class="row mb-3">
                                <label class="col-sm-3 form-label">
                                    Name
                                </label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" name="category_name" class="form-control">
                                    </div>
                                </div>
                            </div>

                            

                           
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\BQ\BQWorkCategoryStoreRequest', '#submit-form') !!}
@endpush
