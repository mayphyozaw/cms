@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        {{-- <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap"> --}}
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">

            <div>
                <h4 class="mb-1">All Assets<span class="badge badge-soft-primary ms-2">{{$assets->count()}}</span></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Materials</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Assets</li>
                    </ol>
                </nav>
            </div>
        </div>

        {{-- <div class="d-flex overflow-x-auto align-items-start gap-3" style="padding-bottom:-10px;"> --}}
        <div class="d-flex overflow-x-auto align-items-start gap-3 pt-0 mt-0">

            <div class="kanban-list-items p-2 rounded border">
                <div class="card mb-0 border-0 shadow bg-info">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="d-flex align-items-center mb-1"
                                    style="color: white;font-size:14px; !important;"><i
                                        class="ti ti-circle-filled fs-10 text-info me-1"></i>
                                    Fixed Assets
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
                                            {{$fixedAsset->count()}}
                                        </span>
                                    </a>
                                    
                                </div>
                            </div>



                        </div>
                    </div>
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
                                    Variable Assets
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
                                            {{$variableAsset->count()}}
                                        </span>
                                    </a>
                                    
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
                        <h5 class="card-title mb-0">Assets Information</h5>
                    </div>

                    <div class="col-auto">
                        <x-create-button href="{{ route('material.assets.create') }}">
                            Create Assets
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
                        class="table assetsTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Asset Type</th>
                                <th class="text-center" style="background-color: #9dd2e7">Warehouse Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Category Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Unit</th>
                                <th class="text-center" style="background-color: #9dd2e7">Total Quantity</th>
                                <th class="text-center" style="background-color: #9dd2e7">Status</th>
                                <th class="text-center" style="background-color: #9dd2e7">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>


    </div>
    

    
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('.assetsTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                paging: true,
                ajax: {
                    url: "{{ route('material.assets-datatable') }}",
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
                        data: 'asset_type',
                        name: 'asset_type',
                        className: 'text-center',
                    },
                    
                    {
                        data: 'warehouse_id',
                        name: 'warehouse_id',
                        className: 'text-center',
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center',
                    },
                    {
                        data: 'category_name',
                        name: 'category_name',
                        className: 'text-center',
                    },
                    {
                        data: 'unit',
                        name: 'unit',
                        className: 'text-center',
                    },
                    {
                        data: 'quantity',
                        name: 'quantity',
                        className: 'text-center',
                    },
                    {
                        data: 'status',
                        name: 'status',
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

        });
    </script>
@endpush
