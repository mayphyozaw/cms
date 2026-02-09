<x-edit-button
    href="{{ route('configuration.permission.edit', $permission->id) }}"
    class="btn btn-icon btn-info btn-sm"
>
    <i class="ti ti-edit"></i>
</x-edit-button>


<x-delete-button href="#" class=" btn btn-icon btn-sm btn-danger deleteBtn" data-url="{{ route('configuration.permission.destroy',$permission->id) }}">
    <i class="ti ti-trash"></i>
</x-delete-button>