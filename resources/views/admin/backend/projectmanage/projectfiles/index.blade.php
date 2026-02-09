@extends('layouts.app')
@section('content')
    <div class="content" style="padding-top: 0 !important;">
        <div class="d-flex align-items-center justify-content-between gap-2 mb-2 mt-0 flex-wrap" hidden>
            <div>
                <h4 class="mb-1">All Projects<span class="badge badge-soft-primary ms-2">123</span></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Projects</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Developer Projects</li>
                    </ol>
                </nav>
            </div>
        </div>



        <div class="card border-0 rounded-0">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title mb-0">Project Files Information</h5>
                    </div>

                    <div class="col-auto">
                        {{-- <x-create-button href="{{ route('projectmanage.projectfiles.create') }}">
                            Create Project File
                        </x-create-button> --}}



                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#upload-file-modal">Upload Files</button>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- Add Project Files Modal --}}

    <div id="upload-file-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Files</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('projectmanage.projectfiles.store') }}" method="POST" id="submit-form"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- hidden values set when clicking "Manage File" --}}
                    <input type="hidden" name="project_id" id="modal_project_id">
                    <input type="hidden" name="project_category_id" id="modal_category_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="files" id="upload_files_id">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">

                                <div class="mb-3">
                                    <input type="text" class="form-control" name="remark" placeholder="Remark">

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>

                <div class="content" style="padding-top: 0 !important;">

                    <div class="card border-0 rounded-0">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="background-color: #9dd2e7">#</th>
                                            <th class="text-center" style="background-color: #9dd2e7">File Name</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Download</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Upload Date</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Remark</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Upload By</th>
                                            <th class="text-center" style="background-color: #9dd2e7">Actions</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end modal content -->
        </div> <!-- end modal dialog -->
    </div>
@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\ProjectFiles\ProjectFileStoreRequest', '#submit-form') !!}
    <script>
        $(document).ready(function() {
            $(document).on('click', '.upload-file-modal', function() {
                $('#modal_project_id').val($(this).data('project'));
                $('#modal_category_id').val($(this).data('category'));
            });

          
        });
    </script>
@endpush
