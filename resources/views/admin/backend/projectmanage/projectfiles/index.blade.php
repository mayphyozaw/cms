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



        <div class="card border-0 rounded-0" hidden>
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

    {{-- @include('modals.upload-file-modal') --}}
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
