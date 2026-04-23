@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">
                    All BQ Categories
                    <span class="badge badge-soft-primary ms-2"></span>
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Projects
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            WorkScope Titles
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">
                            BQ Category Information
                        </h5>
                    </div>
                    <div class="col-auto">
                        <x-create-button href="{{ route('bq.bqcategory.create') }}">
                            Create Category
                        </x-create-button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-search d-flex align-items-center">
                    <div class="search-input">
                        <a href="javascript:void(0);" class="btn-searchset">
                            <i class="isax isax-search-normal fs-12"></i>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table bqcategoryTable table-bordered table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    #
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    Category Name
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    Remark
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bqCategories as $bqCategory)
                                <tr>
                                    <td class="text-center">
                                        {{$loop->iteration}}
                                    </td>
                                    <td class="text-center">
                                        {{$bqCategory->name}}
                                    </td>
                                    <td class="text-center">
                                        {{$bqCategory->description}}
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('bq.bqcategory.destroy', $bqCategory->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('material.assets.index', $bqCategory->id)}}" class="btn btn-sm btn-success">
                                                Detail
                                            </a>
                                            <a href="{{route('bq.bqcategory.edit', $bqCategory->id)}}" class="btn btn-sm btn-icon btn-info">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <button type="buttom" class="btn btn-sm btn-icon btn-danger del_confirm">
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
@endsection
