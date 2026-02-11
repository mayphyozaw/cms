<x-edit-button href="{{ route('material.assets.purchase', $assets->id) }}" class="btn btn-sm btn-warning" title="Purchase">
    <i class="ti ti-arrow-right"></i>
    <small>Purchase</small>
</x-edit-button>

{{-- <x-edit-button href="{{ route('material.fixedassets.purchase', $fixedAssets->id) }}" class="btn btn-icon btn-sm btn-warning" title="Purchase">
    <i class="ti ti-arrow-right"></i>
</x-edit-button> --}}

<x-edit-button href="{{ route('material.assets.edit', $assets->id) }}" class="btn btn-icon btn-sm btn-info" title="Edit">
    <i class="ti ti-edit"></i>
</x-edit-button>

<x-delete-button href="#" class=" btn btn-icon btn-sm btn-danger deleteBtn"
    data-url="{{ route('material.assets.destroy', $assets->id) }}" style="background-color: red" title="Delete">
    <i class="ti ti-trash"></i>
</x-delete-button>