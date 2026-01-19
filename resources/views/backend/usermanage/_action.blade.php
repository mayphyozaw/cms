<x-edit-button href="{{ route('usermanage.edit', $user->id) }}" class="btn btn-icon btn-sm btn-info">
    <i class="ti ti-edit"></i>
</x-edit-button>




<button type="button"
    class="btn btn-icon btn-sm btn-success openResignModal"
    data-id="{{ $user->id }}"
    data-name="{{ $user->name }}"
    data-email="{{ $user->email }}"
    data-bs-toggle="modal"
    data-bs-target="#resignModal">
    <i class="ti ti-checkbox"></i>
</button>

<x-edit-button href="{{ route('usermanage.edit', $user->id) }}" class="btn btn-icon btn-sm btn-warning" title="Block">
    <i class="ti ti-ban"></i>
</x-edit-button>

<x-delete-button href="#" class=" btn btn-icon btn-sm btn-danger deleteBtn" data-url="{{ route('usermanage.destroy',$user->id) }}" style="background-color: red">
    <i class="ti ti-trash"></i>
</x-delete-button>
