@extends('layouts.app')
@section('content')
    <div class="content pb-0">
        <div class="mb-4">
            <h4 class="mb-1">Purchase Informations</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Purchase</li>
                </ol>
            </nav>
        </div>


        <div class="card border-0 rounded-0">

            {{-- <div class="card-header">
                <h5 class="card-title">Customer Information</h5>
            </div> --}}
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Purchase Information</h5>
                    </div>

                    <div class="col-auto">
                        <x-create-button href="{{ route('purchase.create') }}">
                            Create Purchade
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
                        class="table purchaseTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Purchase Date</th>
                                <th class="text-center" style="background-color: #9dd2e7">Purchase No</th>
                                <th class="text-center" style="background-color: #9dd2e7">Supplier</th>
                                <th class="text-center" style="background-color: #9dd2e7">Total Quantity</th>
                                {{-- <th class="text-center" style="background-color: #9dd2e7">Asset Name</th> --}}
                                <th class="text-center" style="background-color: #9dd2e7">Grand Total (MMK)</th>
                                <th class="text-center" style="background-color: #9dd2e7">Payment</th>
                                <th class="text-center" style="background-color: #9dd2e7">Payment Method</th>
                                <th class="text-center" style="background-color: #9dd2e7">Status</th>
                                <th class="text-center" style="background-color: #9dd2e7">Pay By User</th>
                                <th class="text-center" style="background-color: #9dd2e7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchaseAllData as $purchaseData)
                                @foreach ($purchaseData->purchaseItems as $purchaseItem)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td class="text-center">{{ $purchaseData->purchase_date }}</td>
                                    <td class="text-center">{{ $purchaseData->purchase_no }}</td>
                                    <td class="text-center">{{ $purchaseData->supplier->name }}</td>
                                    <td class="text-center">
                                        {{ $purchaseItem->quantity ?? 0 }}
                                    </td>
                                    <td class="text-center">
                                        {{ number_format($purchaseData->total_amount, 2) }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-soft-primary ms-2">
                                            Waiting Payment
                                        </span>
                                    </td>
                                    <td class="text-center"><span class="badge bg-success me-1">Cash</span></td>
                                    <td class="text-center">
                                        <span class="badge bg-danger me-1">
                                            {{ $purchaseData->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-danger me-1">
                                           {{ $purchaseData->payments->first()->user->name ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            @method('DELETE')
                                            @csrf
                                            
                                            <a class="btn btn-warning btn-sm btn-icon" href="">
                                                <i class="ti ti-eye"></i>
                                            </a>

                                            <a class="btn btn-sm btn-icon" href=""
                                                style="background-color: #4aa1a3; color:white">
                                                <i class="ti ti-download"></i>
                                            </a>

                                            <a class="btn btn-info btn-sm" href="{{ route('purchase.edit', $purchaseData->id) }}">
                                                <span>Pay Now</span>
                                            </a>

                                            <a class="btn btn-success btn-sm btn-icon" href="{{ route('purchase.edit', $purchaseData->id) }}">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            

                                            <a class="btn btn-danger btn-sm btn-icon" href="">
                                                <i class="ti ti-trash"></i>
                                            </a>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            var table = $('.purchaseTable').DataTable({
                processing: true,
                serverSide: true,
                searchable: true,
                ajax: {
                    url: "{{ route('purchase-datatable') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: 'text-start',
                        orderable: false,
                        searchable: false
                    },

                    {
                        data: 'warehouse',
                        name: 'warehouse',
                        className: 'text-start'
                    },

                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-start'
                    },

                    {
                        data: 'grand_total',
                        name: 'grand_total',
                        className: 'text-start',
                        orderable: false,
                        searchable: true
                    },

                    {
                        data: 'payment',
                        name: 'payment',
                        className: 'text-start'
                    },

                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'text-start',
                        orderable: false,
                        searchable: false
                    },

                    {
                        data: 'action',
                        name: 'action',
                        className: 'text-start',
                        orderable: false,
                        searchable: false
                    }
                ],
                responsive: true
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
            })
        });
    </script> --}}
@endpush
