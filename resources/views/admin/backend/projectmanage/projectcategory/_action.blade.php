<x-edit-button
    href="{{ route('projectmanage.projectcategory.edit', $project_category->id) }}"
    class="btn btn-icon btn-info btn-sm"
>
    <i class="ti ti-edit"></i>
</x-edit-button>


<x-delete-button href="#" class=" btn btn-icon btn-sm btn-danger deleteBtn" data-url="{{ route('projectmanage.projectcategory.destroy',$project_category->id) }}">
    <i class="ti ti-trash"></i>
</x-delete-button>