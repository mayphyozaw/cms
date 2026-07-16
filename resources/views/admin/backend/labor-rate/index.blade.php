@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">Labor Rate Lists<span class="badge badge-soft-primary ms-2">{{$laborRates->count()}}</span></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Labor Rate Lists</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Labor Rate  Lists</h5>
                    </div>

                    <div class="col-auto">
                        <x-create-button href="{{ route('labor.labor-rate.create') }}">
                            Create Labor Rate
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
                        class="table laborRateTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Labor Type</th>
                                <th class="text-center" style="background-color: #9dd2e7"> Rate</th>
                                <th class="text-center" style="background-color: #9dd2e7">Effective Date</th>
                                <th class="text-center" style="background-color: #9dd2e7">Status</th>
                                <th class="text-center" style="background-color: #9dd2e7">Remark</th>
                                <th class="text-center" style="background-color: #9dd2e7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laborRates as $laborRate)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $laborRate->laborType->name}}</td>
                                    <td>{{ $laborRate->rate }}</td>
                                    <td>{{ $laborRate->effective_date }}</td>
                                    <td>{{ $laborRate->status }}</td>
                                    <td>{{ $laborRate->remark }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-icon btn-sm btn-info"
                                            href="{{ route('labor.labor-rate.edit', $laborRate->id) }}">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form action="{{ route('labor.labor-rate.destroy', $laborRate->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-icon deleteBtn">
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
    @endsection

    @push('scripts')
        <script>
            $(document).on('click', '.deleteBtn', function(e) {
                e.preventDefault();

                let form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Delete this data!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        </script>
    @endpush
