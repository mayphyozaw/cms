<x-edit-button href="{{route('purchase.index', $asset->id)}}" class="btn btn-sm btn-warning" title="Purchase">
    <i class="ti ti-arrow-right"></i>
    <small>Purchase</small>
</x-edit-button>

{{-- <x-edit-button href="{{ route('material.fixedassets.purchase', $fixedAssets->id) }}" class="btn btn-icon btn-sm btn-warning" title="Purchase">
    <i class="ti ti-arrow-right"></i>
</x-edit-button> --}}

{{-- <x-edit-button class="btn btn-sm btn-icon" href="{{ route('detail.asset', $assetData->id) }}"
    style="background-color: #4aa1a3; color:white" title="detail">
    <i class="ti ti-eye"></i>
</x-edit-button> --}}


<x-edit-button href="{{route('material.assets.edit', $asset->id)}}" class="btn btn-icon btn-sm btn-info" title="Edit">
    <i class="ti ti-edit"></i>
</x-edit-button>

<x-delete-button href="#" class=" btn btn-icon btn-sm btn-danger deleteBtn"
    data-url="{{ route('material.assets.destroy', $assets->id) }}" style="background-color: red" title="Delete">
    <i class="ti ti-trash"></i>
</x-delete-button>
