@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Admin User</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Admin User</li>
                </ol>
            </nav>
        </div>

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <div class="input-icon input-icon-start position-relative">
                    <span class="input-icon-addon text-dark"><i class="ti ti-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <x-create-button href="{{ route('usermanage.create') }}">
                    Create User
                </x-create-button>
            </div>
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
                        class="table userTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Status</th>
                                <th class="text-center" style="background-color: #9dd2e7">Employee No</th>
                                <th class="text-center" style="background-color: #9dd2e7">Username</th>
                                <th class="text-center" style="background-color: #9dd2e7">Email</th>
                                <th class="text-center" style="background-color: #9dd2e7">Department</th>
                                <th class="text-center" style="background-color: #9dd2e7">Profile Photo</th>
                                <th class="text-center" style="background-color: #9dd2e7">Phone </th>
                                <th class="text-center" style="background-color: #9dd2e7">Address</th>
                                <th class="text-center" style="background-color: #9dd2e7">Gender</th>
                                <th class="text-center" style="background-color: #9dd2e7">NRC</th>
                                <th class="text-center" style="background-color: #9dd2e7">NRC Front Photo</th>
                                <th class="text-center" style="background-color: #9dd2e7">NRC Back Photo</th>
                                <th class="text-center" style="background-color: #9dd2e7">Household Members</th>
                                <th class="text-center" style="background-color: #9dd2e7">Reference Letter</th>
                                <th class="text-center" style="background-color: #9dd2e7">E-Signature</th>
                                <th class="text-center" style="background-color: #9dd2e7">Employee Type</th>
                                <th class="text-center" style="background-color: #9dd2e7">Join Date</th>
                                <th class="text-center" style="background-color: #9dd2e7">Emergency Contact Person</th>
                                <th class="text-center" style="background-color: #9dd2e7">Emergency Contact Number</th>
                                <th class="text-center" style="background-color: #9dd2e7">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Resign Modal --}}

    <div class="modal fade" id="resignModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Employee Resignation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('confirm_resign') }}" method="POST" id="submit-form">
                    @csrf
                    <input type="hidden" name="user_id" id="resign_user_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Employee Name</label>
                            <input type="text" class="form-control" id="resign_name" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Resignation Date</label>
                            <input type="date" class="form-control" name="resign_date">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Reason (Optional)</label>
                            <textarea class="form-control" name="reason" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Confirm Resignation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\ResignEmployees\ResignEmployeeUpdateRequest', '#submit-form') !!}

    <script>
        $(document).ready(function() {
            var table = $('.userTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                paging: true,
                ajax: {
                    url: "{{ route('user-datatable') }}",
                    type: "GET"
                },
                rowCallback: function(row, data) {
                    if (data.is_block == 1) {
                        $(row).addClass('user-blocked');
                    } else {
                        $(row).removeClass('user-blocked');
                    }
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
                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-center',
                        orderable: false,
                        searchable: false
                    },

                ],
            });

            $(document).on('click', '.openResignModal', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');
                $('#resign_user_id').val(id);
                $('#resign_name').val(name);
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



            $(document).on('click', '.toggleBlockBtn', function(e) {
                e.preventDefault();

                let btn = $(this);
                let url = btn.data('url');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        toastr.success(res.message);
                        if (res.is_block == 1) {
                            btn
                                .removeClass('btn-danger')
                                .addClass('btn-success')
                                .text('Unblock');
                        } else {
                            btn
                                .removeClass('btn-success')
                                .addClass('btn-danger')
                                .text('Block');
                        }
                        let row = btn.closest('tr');
                        if (res.is_block == 1) {
                            row.addClass('user-blocked');
                        } else {
                            row.removeClass('user-blocked');
                        }
                        // table.ajax.reload(null, false);
                    },
                    error: function() {
                        toastr.error('Action failed');
                    }
                });
            });



        });
    </script>
@endpush
