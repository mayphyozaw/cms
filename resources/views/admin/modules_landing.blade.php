@extends('layouts.plain') {{-- A layout without sidebars --}}

@section('content')
<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="row text-center">
        <h2 class="mb-5">Select a Module</h2>
        
        <div class="col-md-3">
            <a href="{{ route('crm.dashboard') }}" class="card p-4 shadow-sm">
                <i class="fa fa-users fa-3x mb-3"></i>
                <h5>CRM</h5>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('construction.dashboard') }}" class="card p-4 shadow-sm">
                <i class="fa fa-building fa-3x mb-3"></i>
                <h5>Construction</h5>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('inventory.dashboard') }}" class="card p-4 shadow-sm">
                <i class="fa fa-warehouse fa-3x mb-3"></i>
                <h5>Inventory</h5>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('accounting.dashboard') }}" class="card p-4 shadow-sm">
                <i class="fa fa-calculator fa-3x mb-3"></i>
                <h5>Accounting</h5>
            </a>
        </div>
    </div>
</div>
@endsection