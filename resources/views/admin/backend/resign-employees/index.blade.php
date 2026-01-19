@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Resign Employees</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">All Resign Employees </a></li>

                </ol>
            </nav>
        </div>

        <div class="card border-0 rounded-0">
            <div class="card-header">
                <h5 class="card-title">User Information</h5>
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
                        class="table resignTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #dfa190">#</th>
                                <th class="text-center" style="background-color: #dfa190">Status</th>
                                <th class="text-center" style="background-color: #dfa190">Resigned Date</th>
                                <th class="text-center" style="background-color: #dfa190">Employee No</th>
                                <th class="text-center" style="background-color: #dfa190">Username</th>
                                <th class="text-center" style="background-color: #dfa190">Email</th>
                                <th class="text-center" style="background-color: #dfa190">Department</th>
                                <th class="text-center" style="background-color: #dfa190">Profile Photo</th>
                                <th class="text-center" style="background-color: #dfa190">Phone </th>
                                <th class="text-center" style="background-color: #dfa190">Address</th>
                                <th class="text-center" style="background-color: #dfa190">Gender</th>
                                <th class="text-center" style="background-color: #dfa190">NRC</th>
                                <th class="text-center" style="background-color: #dfa190">NRC Front Photo</th>
                                <th class="text-center" style="background-color: #dfa190">NRC Back Photo</th>
                                <th class="text-center" style="background-color: #dfa190">Household Members</th>
                                <th class="text-center" style="background-color: #dfa190">Reference Letter</th>
                                <th class="text-center" style="background-color: #dfa190">E-Signature</th>
                                <th class="text-center" style="background-color: #dfa190">Employee Type</th>
                                <th class="text-center" style="background-color: #dfa190">Join Date</th>
                                <th class="text-center" style="background-color: #dfa190">Emergency Contact Person</th>
                                <th class="text-center" style="background-color: #dfa190">Emergency Contact Number</th>
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
            var table = $('.resignTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                paging: true,
                ajax: {
                    url: "{{ route('resign-employee-datatable') }}",
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
                        data: 'status',
                        name: 'status',
                        className: 'text-center',
                    },
                    {
                        data: 'resign_date',
                        name: 'resign_date',
                        className: 'text-center',
                    },
                    {
                        data: 'employee_number',
                        name: 'employee_number',
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
                        data: 'department',
                        name: 'department',
                        className: 'text-center',
                    },
                    {
                        data: 'photo',
                        name: 'photo',
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
                        data: 'gender',
                        name: 'gender',
                        className: 'text-center',
                    },
                    {
                        data: 'nrc',
                        name: 'nrc',
                        className: 'text-center',
                    },
                    {
                        data: 'nrcfrontphoto',
                        name: 'nrcfrontphoto',
                        className: 'text-center',
                    },
                    {
                        data: 'nrcbackphoto',
                        name: 'nrcbackphoto',
                        className: 'text-center',
                    },
                    {
                        data: 'householdphoto',
                        name: 'householdphoto',
                        className: 'text-center',
                    },
                    {
                        data: 'referenceletter',
                        name: 'referenceletter',
                        className: 'text-center',
                    },
                    {
                        data: 'esingphoto',
                        name: 'esingphoto',
                        className: 'text-center',
                    },



                    {
                        data: 'employeetype',
                        name: 'employeetype',
                        className: 'text-center',
                    },
                    {
                        data: 'joindate',
                        name: 'joindate',
                        className: 'text-center',
                    },
                    {
                        data: 'contact_person',
                        name: 'contact_person',
                        className: 'text-center',
                    },
                    {
                        data: 'contact_number',
                        name: 'contact_number',
                        className: 'text-center',
                    },
                ],
            });

        });
    </script>
@endpush
