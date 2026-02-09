@forelse ($project_files as $key => $project_file)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $project_file->file_name }}</td>

        <td>
            <a href="{{ asset('upload/project_files/' . $project_file->files) }}" class="btn btn-sm btn-primary"
                download="{{ $project_file->file_name }}">
                Download
            </a>
        </td>

        <td>{{ $project_file->uploaded_at }}</td>
        <td>{{ $project_file->remark }}</td>
        <td>{{ optional($project_file->user)->name }}</td>
        <td>
            <a href="javascript:void(0)" class="btn btn-danger btn-sm"
                onclick="deleteProjectFile({{ $project_file->id }}, {{ $project_file->project_id }}, {{ $project_file->project_category_id }})">
                Delete
            </a>
        </td>

    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center text-muted">
            No files uploaded yet
        </td>
    </tr>
@endforelse
