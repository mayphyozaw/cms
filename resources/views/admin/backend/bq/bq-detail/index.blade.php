@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">
                     BOQ Details
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
                            BOQ Details
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
                            BOQ Details Information
                        </h5>
                    </div>
                    <div class="col-auto">
                        <x-create-button href="{{ route('projectmanage.projects.boq-detail.create', [$project->id,$boq->id]) }}">
                            Create BOQ Details
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
                    <table id="datatable"
                        class="table bqworkcategoryTable table-bordered table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    #
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    BOQ ID
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    Drawing Measurement ID
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                     Work Scope
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    Work Type
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    BOQ Category
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    Item  Name
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    Unit
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    Quantity
                                </th>
                                <th class="text-center" style="background-color: #9dd2e7">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($bqWorkCategories as $bqWorkCategory)
                                <tr>
                                    <td class="text-center">
                                        {{$loop->iteration}}
                                    </td>

                                    <td class="text-center">
                                        {{$bqWorkCategory->workscope->title}}
                                    </td>


                                    <td class="text-center">
                                        {{$bqWorkCategory->boq_work_types}}
                                    </td>

                                    <td class="text-center">
                                        {{$bqWorkCategory->category_name}}
                                    </td>

                                    <td class="text-center">
                                        <form action="{{ route('bq.bqworkcategory.destroy', $bqWorkCategory->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <a href="{{route('bq.bqworkcategory.edit', $bqWorkCategory->id)}}" class="btn btn-sm btn-icon btn-info">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <button type="buttom" class="btn btn-sm btn-icon btn-danger del_confirm">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
