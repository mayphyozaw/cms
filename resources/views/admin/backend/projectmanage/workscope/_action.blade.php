<x-edit-button
    href="{{ route('projectmanage.workscope.edit', $work_scope->id) }}"
    class="btn btn-icon btn-info btn-sm"
>
    <i class="ti ti-edit"></i>
</x-edit-button>


<x-delete-button href="#" class=" btn btn-icon btn-sm btn-danger deleteBtn" data-url="{{ route('projectmanage.workscope.destroy',$work_scope->id) }}">
    <i class="ti ti-trash"></i>
</x-delete-button>