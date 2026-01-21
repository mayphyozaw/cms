@if ($user->id !== auth()->id())
<x-edit-button href="{{ route('usermanage.edit', $user->id) }}" class="btn btn-icon btn-sm btn-info" title="Edit">
    <i class="ti ti-edit"></i>
</x-edit-button>
@endif

@if ($user->id !== auth()->id())
<button type="button" class="btn btn-icon btn-sm btn-success openResignModal" data-id="{{ $user->id }}"
    data-name="{{ $user->name }}" data-bs-toggle="modal" data-bs-target="#resignModal" title="Resign">
    <i class="ti ti-checkbox"></i>
</button>
@endif

@if ($user->id !== auth()->id())
<button class="btn btn-sm toggleBlockBtn
    {{ $user->is_block ? 'btn-success' : 'btn-warning' }}"
    data-url="{{ route('usermanage.toggle-block', $user->id) }}">
    {{ $user->is_block ? 'Unblock' : 'Block' }}
</button>
@endif

@if ($user->id !== auth()->id())
<x-delete-button href="#" class=" btn btn-icon btn-sm btn-danger deleteBtn"
    data-url="{{ route('usermanage.destroy', $user->id) }}" style="background-color: red" title="Delete">
    <i class="ti ti-trash"></i>
</x-delete-button>
@endif
