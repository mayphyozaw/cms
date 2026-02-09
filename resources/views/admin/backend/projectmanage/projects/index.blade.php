@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap">
            <div>
                <h4 class="mb-1">All Projects<span class="badge badge-soft-danger ms-2">{{ $projects->count() }}</span></h4>
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
                                        class="ti ti-circle-filled fs-10 text-warning me-1"></i>Developer Projects
                                    <span
                                        class="badge rounded-pill
                                            bg-purple-gradient ms-2">{{ $projects->where('project_type', 'Developer')->count() }}</span>
                                    {{-- <span class="badge badge-soft-success ms-2">{{ $projects->where('project_type', 'PAE')->count() }}</span> --}}
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="dropdown table-action ms-2">
                                    <a href="#" class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('projectmanage.projects.create') }}"><i
                                                class="fa-solid fa-pencil text-blue"></i>
                                            Create
                                        </a>

                                        {{-- <a class="dropdown-item" href="{{ route('material.category.store') }}"
                                            data-bs-toggle="modal" data-bs-target="#editModal"><i
                                                class="fa-solid fa-pencil text-blue"></i>
                                            Edit
                                        </a> --}}

                                        <a class="dropdown-item" href="">

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

            <div class="kanban-list-items p-2">
                <div class="card mb-0 border-0 shadow bg-primary">
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="d-flex align-items-center mb-1"
                                    style="color: white;font-size:14px; !important;"><i
                                        class="ti ti-circle-filled fs-10 text-success me-1"></i>PAE Projects
                                    <span
                                        class="badge rounded-pill
                                            bg-secondary-gradient ms-2">{{ $projects->where('project_type', 'PAE')->count() }}</span>
                                    {{-- <span class="badge badge-soft-success ms-2">{{ $projects->where('project_type', 'PAE')->count() }}</span> --}}
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="dropdown table-action ms-2">
                                    <a href="#" class="action-icon btn btn-xs shadow btn-icon btn-outline-light"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('projectmanage.projects.create') }}">
                                            <i class="fa-solid fa-pencil text-blue">
                                            </i>
                                            Create
                                        </a>

                                        {{-- <a class="dropdown-item" href="{{ route('material.category.store') }}"
                                            data-bs-toggle="modal" data-bs-target="#editModal"><i
                                                class="fa-solid fa-pencil text-blue"></i>
                                            Edit
                                        </a> --}}

                                        <a class="dropdown-item" href="{{ route('material.category.index') }}">
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


        </div>

        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Projects Information</h5>
                    </div>

                    <div class="col-auto">
                        <x-create-button href="{{ route('projectmanage.projects.create') }}">
                            Create Project
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
                    <table class="table table-bordered table-responsive table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center" style="background-color: #9dd2e7">#</th>
                                <th class="text-center" style="background-color: #9dd2e7">Customer Name</th>
                                <th class="text-center" style="background-color: #9dd2e7">Project Code</th>
                                <th class="text-center" style="background-color: #9dd2e7">Project Type</th>
                                <th class="text-center" style="background-color: #9dd2e7">Project Status</th>
                                <th class="text-center" style="background-color: #9dd2e7">Project Date</th>
                                @foreach ($project_categories as $item)
                                    <th class="text-center" style="background-color: #9dd2e7">{{ $item->title }}</th>
                                @endforeach
                                <th class="text-center" style="background-color: #9dd2e7">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="projects">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('modals.upload-file-modal')
@endsection

@push('scripts')
    <script>
        function loadProjects() {
            $.ajax({
                url: "{{ route('projectmanage.load_projects') }}",
                type: 'GET',
                success: function(data) {
                    $('#projects').html(data.html);
                },
            });
        }
        loadProjects();


        function showModal(project_id, project_category_id) {
            var modalElement = document.getElementById('upload-file-modal');
            var modal = new bootstrap.Modal(modalElement);
            modal.show();

            document.getElementById('modal_project_id').value = project_id;
            document.getElementById('modal_project_category_id').value = project_category_id;

            loadProjectFiles(project_id, project_category_id);

        }

        function loadProjectFiles(project_id, project_category_id) {
            $.ajax({
                url: "{{ route('projectmanage.get_project_files_with_view') }}",
                type: 'GET',
                data: {
                    project_id: project_id,
                    project_category_id: project_category_id,
                },
                success: function(data) {
                    $('#project-files').html(data.html);
                },
            });
        }

        function deleteProjectFile(id, project_id, project_category_id) {
            if (!confirm('Are you sure you want to delete this file?')) {
                return;
            }
            $.ajax({
                url: "{{ route('projectmanage.project_file_delete') }}",
                type: 'GET',
                data: {
                    project_file_id: id,
                },
                success: function(data) {
                    loadProjectFiles(project_id, project_category_id);
                },
            });
        }

        
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
                            loadProjects(); // 🔥 reload only table
                            toastr.success(response.message);
                        },
                        error: function() {
                            toastr.error('Delete failed!');
                        }

                    });
                }
            });


        });

        const uploadModal = document.getElementById('upload-file-modal');
        uploadModal.addEventListener('hidden.bs.modal', function() {
            loadProjects();
        });
    </script>

    @if (session('open_upload_modal'))
        <script>
            var project_id = {{ session('project_id') }};
            var project_category_id = {{ session('project_category_id') }};
            document.addEventListener('DOMContentLoaded', function() {
                showModal(project_id, project_category_id);
            });
        </script>
    @endif
@endpush
