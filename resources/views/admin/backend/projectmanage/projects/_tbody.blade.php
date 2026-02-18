@foreach ($projects as $project)
    <tr>
        <td class="text-center">{{ $loop->iteration }}</td>
        <td class="text-center">{{ $project->client?->name }}</td>
        <td class="text-center">P- {{ $project->client->project_code }}</td>
        <td class="text-center">
            <span
                class="badge rounded-pill
                                            {{ $project->project_type === 'Developer' ? 'bg-purple-gradient' : 'bg-secondary-gradient' }}">
                {{ $project->project_type }}
            </span>
        </td>

        <td class="text-center">
            <span class="badge badge-soft-{{ $project->projectStatusBadge() }}">
                {{ $project->status }}
            </span>
        </td>

        <td class="text-center">{{ $project->start_date }}</td>

        @foreach ($project_categories as $category)
            @php
                $hasFile = $project->fileCountByCategory($category->id);

            @endphp
            <td class="text-center" style="min-width:120px">
                @if ($hasFile)
                    <i class="ti ti-check text-success">
                        <span> Finished - </span>
                        {{-- {{ \Carbon\Carbon::parse($project->project_file->uploaded_at)->format('Y-m-d H:i') }} --}}
                        {{ $project->project_file->uploaded_at }}
                    </i>
                @else
                    <i class="ti ti-x text-danger"></i>
                @endif
                <div class="progress" style="height:8px;">
                    <div class="progress-bar {{ $hasFile ? 'bg-success' : 'bg-danger' }}" style="width: 100%;"
                        role="progressbar"></div>
                </div>

                {{-- @if ($hasFile)
                    <i class="ti ti-check text-success"> Finished 16-02-2026</i>
                @else
                    <i class="ti ti-x text-danger"></i>
                @endif --}}

                <small class="text-muted">
                    <a href="javascript:void(0)"
                        class="upload-file-modal {{ $hasFile ? 'text-success' : 'text-danger' }}"
                        onclick="showModal({{ $project->id }}, {{ $category->id }})">
                        
                        <span class="d-flex justify-content-end">
                            Upload <span>&nbsp;&nbsp;</span>
                            <i class="ti ti-upload"></i>
                        </span>
                         
                    </a>
                </small>
                
                   
            </td>
        @endforeach

        <td class="text-center">
            <x-edit-button href="{{ route('projectmanage.projects.edit', $project->id) }}"
                class="btn btn-icon btn-sm btn-info" title="Edit">
                <i class="ti ti-edit"></i>
            </x-edit-button>

            <x-delete-button href="#" class=" btn btn-icon btn-sm btn-danger deleteBtn"
                data-url="{{ route('projectmanage.projects.destroy', $project->id) }}" style="background-color: red"
                title="Delete">
                <i class="ti ti-trash"></i>
            </x-delete-button>
        </td>

    </tr>
@endforeach
