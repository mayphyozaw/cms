@extends('layouts.app')
@section('content')
    <!-- Start Content -->
    <div class="content pb-0 py-5 m-10">
        
        <!-- row start -->
        <div class="row d-flex justify-content-center">
            <div class="col-xl-3 col-md-6">
                <div class="card shadow">
                    <a href="">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="avatar avatar-lg rounded-circle fs-24 flex-shrink-0">
                                        {{-- <i class="ti ti-brand-campaignmonitor"></i> --}}
                                        <img src="{{ asset('data/project.png') }}" alt="" style="width:50px">
                                    </span>
                                </div>
                            </div>
                            <div class="py-2">
                                <p class="mb-1 text-center">CRM</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card shadow">
                    <a href="{{route('usermanage.index')}}">
                        
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="avatar avatar-lg rounded-circle fs-24 flex-shrink-0">
                                        {{-- <i class="ti ti-brand-campaignmonitor"></i> --}}
                                        <img src="{{ asset('data/user.png') }}" alt="" style="width:50px">
                                    </span>
                                </div>
                            </div>
                            <div class="py-2">
                                <p class="mb-1 text-center">Construction Management</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card shadow">
                    <a href="">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="avatar avatar-lg rounded-circle bg-secondary fs-24 flex-shrink-0">
                                        {{-- <i class="ti ti-brand-campaignmonitor"></i> --}}
                                        <img src="{{ asset('data/realestate.png') }}" alt="" style="width:50px">
                                    </span>
                                </div>
                            </div>
                            <div class="py-2">
                                <p class="mb-1 text-center">Inventory Management</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card shadow">
                    <a href="">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="avatar avatar-lg rounded-circle fs-24 flex-shrink-0">
                                        {{-- <i class="ti ti-brand-campaignmonitor"></i> --}}
                                        <img src="{{ asset('data/engineer.png') }}" alt="" style="width:50px">

                                    </span>

                                </div>


                            </div>
                            <div class="py-2">
                                <p class="mb-1 text-center">Accounting</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- row end -->

    </div>
@endsection
