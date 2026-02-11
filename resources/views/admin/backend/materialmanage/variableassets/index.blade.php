@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">Variable Assets<span class="badge badge-soft-primary ms-2">123</span></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Assets</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Variable Assets</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="d-flex overflow-x-auto align-items-start gap-3 pt-0 mt-0">
            <div class="kanban-list-items p-2">
                <div class="card mb-0 border-0 shadow bg-info">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="d-flex align-items-center mb-1"
                                    style="color: white;font-size:14px; !important;"><i
                                        class="ti ti-circle-filled fs-10 text-warning me-1"></i>Variable Assets Category
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="dropdown table-action ms-2">
                                    <a href="#" class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('material.variable-category.store') }}"
                                            data-bs-toggle="modal" data-bs-target="#addModal"><i
                                                class="fa-solid fa-pencil text-blue"></i>
                                            Add
                                        </a>

                                        {{-- <a class="dropdown-item" href="{{ route('material.category.store') }}"
                                            data-bs-toggle="modal" data-bs-target="#editModal"><i
                                                class="fa-solid fa-pencil text-blue"></i>
                                            Edit
                                        </a> --}}

                                        <a class="dropdown-item" href="{{ route('material.variable-category.index') }}">
                                            Show
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="kanban-drag-wrap">
                </div>

            </div>
            <div class="kanban-list-items p-2 rounded border">
                <div class="card mb-0 border-0 shadow bg-danger">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="d-flex align-items-center mb-1"
                                    style="color: white;font-size:14px; !important;"><i
                                        class="ti ti-circle-filled fs-10 text-info me-1"></i>
                                    Variable Assets Requests
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="dropdown table-action ms-2">


                                    <a href="#" class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <a href="#"
                                        class="topbar-link btn topbar-link dropdown-toggle drop-arrow-none btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false"
                                        aria-expanded="false">
                                        <i class="ti ti-bell-check fs-16 animate-ring"></i>
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                            10
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i>
                                            Show</a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#delete_lead"><i
                                                class="fa-regular fa-trash-can text-danger"></i>
                                            Detail</a>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="kanban-list-items p-2 rounded border">
                <div class="card mb-0 border-0 shadow bg-warning">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="d-flex align-items-center mb-1"
                                    style="color:white;font-size:14px;!important"><i
                                        class="ti ti-circle-filled fs-10 text-success me-1"></i>Complete Requests
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="javascript:void(0);" class="text-info"><i class="ti ti-plus"></i></a>
                                <div class="dropdown table-action ms-2">
                                    <a href="#" class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item " href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvas_edit"><i class="fa-solid fa-pencil text-blue"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#delete_lead"><i
                                                class="fa-regular fa-trash-can text-danger"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Variable Assets Information</h5>
                    </div>

                    <div class="col-auto">
                        <x-create-button href="{{ route('material.variableassets.create') }}">
                            Create Variable Assets
                        </x-create-button>
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
                    <table id="datatable"
                        class="table variableassetsTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Variable Asset Code</th>
                                <th class="text-center" style="background-color: #9dd2e7"> Item Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Variable Category Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Unit</th>
                                <th class="text-center" style="background-color: #9dd2e7">Total Quantity</th>
                                <th class="text-center" style="background-color: #9dd2e7">Reorder Level</th>
                                <th class="text-center" style="background-color: #9dd2e7">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>


    </div>

    {{-- Add Fixed Asset Category Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Variable Asset Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('material.variable-category.store') }}" method="POST" id="submit-form">
                    @csrf
                    <input type="hidden" name="category_id" id="variableasset_category_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="variable_category_name"
                                name="variable_category_name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\VariableAssets\VariableCategoryStoreRequest', '#submit-form') !!}
    <script>
        $(document).ready(function() {
            var table = $('.variableassetsTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                paging: true,
                ajax: {
                    url: "{{ route('material.variableassets-datatable') }}",
                    type: "GET"
                },

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-center',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'material_code',
                        name: 'material_code',
                        className: 'text-center',
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center',
                    },
                    {
                        data: 'variable_category_name',
                        name: 'variable_category_name',
                        className: 'text-center',
                    },
                    {
                        data: 'unit',
                        name: 'unit',
                        className: 'text-center',
                    },
                    {
                        data: 'total_qty',
                        name: 'total_qty',
                        className: 'text-center',
                    },
                    {
                        data: 'reorder_level',
                        name: 'reorder_level',
                        className: 'text-center',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    },

                ],
            });

            $(document).on('click', '.deleteBtn', function(event) {
                event.preventDefault();
                var url = $(this).data('url');

                Swal.fire({
                    title: "Are you sure?",
                    text: "Delete thie Data!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                table.ajax.reload();
                                toastr.success(response.message);
                            },
                            error: function(response) {
                                toastr.error('Delete failed!');
                            }

                        });
                    }
                });


            });

            $(document).on('click', '.addCategoryModal', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                $('#variableasset_category_id').val(id);
                $('#variable_category_name').val(name);
            });
        });
    </script>
@endpush
