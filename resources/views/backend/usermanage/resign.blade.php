@extends('layouts.app')
@section('content')
  
 <x-edit-button class="btn btn-icon btn-sm btn-success" title="Resign" data-bs-toggle="modal" data-bs-target="#formModal">
        <i class="ti ti-checkbox"></i>
    </x-edit-button>

<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="purchaseForm">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="purchaseForm" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
@endsection


@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Select the modal element
        const modalElement = document.getElementById('formModal');
        
        // 2. Initialize Bootstrap Modal object
        const myModal = new bootstrap.Modal(modalElement);
        
        // 3. Select the button
        const btn = document.getElementById('openBtn');

        if(btn) {
            btn.addEventListener('click', function (event) {
                event.preventDefault(); // Stop the link from navigating
                myModal.show();
            });
        } else {
            console.error("Button with ID 'openBtn' not found!");
        }
    });
</script>
@endpush
