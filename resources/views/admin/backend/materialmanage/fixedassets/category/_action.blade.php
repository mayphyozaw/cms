<button type="button" class="btn btn-icon btn-sm btn-warning addCategoryModal" data-bs-toggle="modal"
    data-bs-target="#addModal" title="Add">
    <i class="ti ti-plus"></i>
</button>

<button class="btn btn-primary btn-sm editCategoryModal" data-id="{{ $category->id }}"
    data-name="{{ $category->category_name }}" data-bs-toggle="modal" data-bs-target="#editModal">
    Edit
</button>

<x-delete-button href="#" class=" btn btn-icon btn-sm btn-danger deleteBtn"
    data-url="{{ route('material.category.destroy', $category->id) }}" style="background-color: red" title="Delete">
    <i class="ti ti-trash"></i>
</x-delete-button>

<x-edit-button href="{{ route('material.fixedassets.index', $category->id) }}" class="btn btn-icon btn-sm btn-success"
    title="Back">
    <i class="ti ti-arrow-left"></i>
</x-edit-button>
