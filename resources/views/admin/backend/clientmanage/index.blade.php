@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Customer Informations <span class="badge badge-soft-danger ms-2">{{ $clients->count() }}</span></h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Customers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Customers</li>
                </ol>
            </nav>
        </div>

        {{-- <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <div class="input-icon input-icon-start position-relative">
                    <span class="input-icon-addon text-dark"><i class="ti ti-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <x-create-button href="{{ route('client.create') }}">
                    Create Customer
                </x-create-button>
            </div>
        </div> --}}

        <div class="card border-0 rounded-0">

            {{-- <div class="card-header">
                <h5 class="card-title">Customer Information</h5>
            </div> --}}
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Customer Information</h5>
                    </div>

                    <div class="col-auto">
                        <x-create-button href="{{ route('client.create') }}">
                            Create Customer
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
                        class="table clientTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Client Code</th>
                                <th class="text-center" style="background-color: #9dd2e7">Client Type</th>
                                <th class="text-center" style="background-color: #9dd2e7">Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Email</th>
                                <th class="text-center" style="background-color: #9dd2e7">Phone </th>
                                <th class="text-center" style="background-color: #9dd2e7">Address</th>
                                <th class="text-center" style="background-color: #9dd2e7">Contact Person</th>
                                <th class="text-center" style="background-color: #9dd2e7">Project Code</th>
                                <th class="text-center" style="background-color: #9dd2e7">Building Area</th>
                                <th class="text-center" style="background-color: #9dd2e7">Number of Storeys</th>
                                <th class="text-center" style="background-color: #9dd2e7">Site Location</th>
                                <th class="text-center" style="background-color: #9dd2e7">City / Township</th>
                                <th class="text-center" style="background-color: #9dd2e7">Construction Type</th>
                                <th class="text-center" style="background-color: #9dd2e7">Job Scope</th>
                                <th class="text-center" style="background-color: #9dd2e7">Job Package</th>
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
            var table = $('.clientTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                paging: true,
                ajax: {
                    url: "{{ route('client-datatable') }}",
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
                        data: 'client_code',
                        name: 'client_code',
                        className: 'text-center',
                    },
                    
                    {
                        data: 'client_type',
                        name: 'client_type',
                        className: 'text-center',
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center',
                    },
                    {
                        data: 'email',
                        name: 'email',
                        className: 'text-center',
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        className: 'text-center',
                    },
                    {
                        data: 'address',
                        name: 'address',
                        className: 'text-center',
                    },
                    {
                        data: 'contact_person',
                        name: 'contact_person',
                        className: 'text-center',
                    },
                    {
                        data: 'project_code',
                        name: 'project_code',
                        className: 'text-center',
                    },
                    {
                        data: 'building_area',
                        name: 'building_area',
                        className: 'text-center',
                    },
                    
                    {
                        data: 'storeys',
                        name: 'storeys',
                        className: 'text-center',
                    },
                    {
                        data: 'site_location',
                        name: 'site_location',
                        className: 'text-center',
                    },
                    {
                        data: 'city',
                        name: 'city',
                        className: 'text-center',
                    },
                    {
                        data: 'construction_type',
                        name: 'construction_type',
                        className: 'text-center',
                    },
                    {
                        data: 'job_scope',
                        name: 'job_scope',
                        className: 'text-center',
                    },
                    {
                        data: 'job_package',
                        name: 'job_package',
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
