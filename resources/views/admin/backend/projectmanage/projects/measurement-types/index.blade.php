@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-4 flex-wrap">
            <div>
                <h4 class="mb-1">Drawing Measurement Lists</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Project</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Drawing Measurement Lists</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card border-0">
            <div class="card-body pb-0 pt-0 px-2">
                <ul class="nav nav-tabs nav-bordered nav-bordered-primary">
                    <li class="nav-item me-3">
                        <a href="{{ route('projectmanage.projects.drawing-measurements.index', $project->id) }}"
                            class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.drawings.index') ? 'active' : '' }}">
                            <i class="ti ti-settings-cog me-2"></i>
                            Drawing Measurement Lists
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="{{ route('projectmanage.projects.measurement-types.index', $project->id) }}"
                            class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.measurement-types.index') ? 'active' : '' }}">
                            <i class="ti ti-device-laptop me-2"></i>
                            Measurement Types
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="{{ route('projectmanage.projects.work-types.index', $project->id) }}"
                            class="nav-link p-2 {{ request()->routeIs('projectmanage.projects.work-types.index') ? 'active' : '' }}">
                            <i class="ti ti-device-laptop me-2"></i>
                            Work Types
                        </a>
                    </li>

                </ul>
            </div> <!-- end card body -->
        </div> <!-- end card -->

        <!-- start row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">

                <div class="card mb-0">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0">Measurement Type</h5>
                            </div>

                            <div class="col-auto">
                                <x-create-button
                                    href="{{ route('projectmanage.projects.measurement-types.create', $project->id) }}">
                                    Create Measurement Type
                                </x-create-button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0">

                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="background-color: #9dd2e7">#</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Name</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Symbol</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Formula</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($measurementTypes as $measurementType)
                                            <tr>
                                                <td class="text-center">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $measurementType->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $measurementType->symbol }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $measurementType->formula }}
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-icon btn-sm btn-info"
                                                        href="{{ route('projectmanage.projects.measurement-types.edit', [$project->id, $measurementType->id]) }}">
                                                        <i class="ti ti-edit"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('projectmanage.projects.measurement-types.destroy', [$project->id, $measurementType->id]) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm btn-icon deleteBtn">
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
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.deleteBtn', function(event) {
            event.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: "Are you sure?",
                text: "Delete this data!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"

            }).then((result) => {

                if (result.isConfirmed) {

                    form.submit();

                }

            });


        });
    </script>
@endpush
