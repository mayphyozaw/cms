@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">Equipemnt Category Lists<span class="badge badge-soft-primary ms-2">{{$eqCategories->count()}}</span></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Equipemnt Category Lists</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Equipemnt Category Lists</h5>
                    </div>

                    <div class="col-auto">
                        <x-create-button href="{{ route('equipment.category.create') }}">
                            Create Equipemnt Category
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
                        class="table eqCategoryTable table-bordered dt-responsive table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Name</th>
                                <th class="text-center" style="background-color: #9dd2e7"> Description</th>
                                <th class="text-center" style="background-color: #9dd2e7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($eqCategories as $eqCategory)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $eqCategory->name }}</td>
                                    <td>{{ $eqCategory->description }}</td>
                                    
                                    
                                    <td class="text-center">
                                        <a class="btn btn-icon btn-sm btn-info"
                                            href="{{ route('equipment.category.edit', $eqCategory->id) }}">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form action="{{ route('equipment.category.destroy', $eqCategory->id) }}"
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
