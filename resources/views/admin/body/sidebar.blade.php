<div class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <div>
            <!-- Logo Normal -->
            <a href="{{ route('dashboard') }}" class="logo logo-normal">
                <img src="{{ asset('data/logo.png') }}" alt="Logo" style="width:100px;">
            </a>

            <!-- Logo Small -->
            <a href="{{ route('dashboard') }}" class="logo-small">
                <img src="{{ asset('backend/assets/img/logo-small.svg') }}" alt="Logo">
            </a>

            <!-- Logo Dark -->
            <a href="{{ route('dashboard') }}" class="dark-logo">
                <img src="{{ asset('backend/assets/img/logo-white.svg') }}" alt="Logo">
            </a>
        </div>
        <button class="sidenav-toggle-btn btn border-0 p-0" id="toggle_btn">
            <i class="ti ti-arrow-bar-to-left"></i>
        </button>

        <!-- Sidebar Menu Close -->
        <button class="sidebar-close">
            <i class="ti ti-x align-middle"></i>
        </button>
    </div>
    <!-- Start Logo -->
    {{-- <div class="sidebar-logo">
        <div>
            <!-- Logo Normal -->
            <a href="{{ route('dashboard') }}" class="logo logo-normal">
                <img src="{{ asset('data/logo.png') }}" alt="Logo" style="width:100px;">
            </a>

            <!-- Logo Small -->
            <a href="{{ route('dashboard') }}" class="logo-small">
                <img src="{{ asset('backend/assets/img/logo-small.svg') }}" alt="Logo">
            </a>

            <!-- Logo Dark -->
            <a href="{{ route('dashboard') }}" class="dark-logo">
                <img src="{{ asset('backend/assets/img/logo-white.svg') }}" alt="Logo">
            </a>
        </div>
        <button class="sidenav-toggle-btn btn border-0 p-0" id="toggle_btn">
            <i class="ti ti-arrow-bar-to-left"></i>
        </button>

        <!-- Sidebar Menu Close -->
        <button class="sidebar-close">
            <i class="ti ti-x align-middle"></i>
        </button>
    </div> --}}
    <!-- End Logo -->

    <!-- Sidenav Menu -->
    <div class="sidebar-inner" data-simplebar>
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Main Menu</span></li>
                <li>
                    <ul>
                        <li><a href="{{ route('dashboard') }}"
                                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="ti ti-dashboard">
                                </i><span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </li>



                {{-- <li class="menu-title"><span>Client Manage</span></li> --}}

                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-user-shield"></i>
                                <span>Client Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="{{ request()->routeIs('client.*') ? 'display:block;' : '' }}">
                                <li>
                                    <a href="{{ route('client.index') }}"
                                        class="{{ request()->routeIs('client.*') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>Clients Informations</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="" class="">
                                        <i class="ti ti-atom-2">
                                        </i><span>Projects Progress</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="" class="">
                                        <i class="ti ti-file-invoice">
                                        </i><span>Invoices</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>


                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-user-shield"></i>
                                <span>Supplier Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="{{ request()->routeIs('suppliermanage.supplier.*') ? 'display:block;' : '' }}">
                                <li>
                                    <a href="{{ route('suppliermanage.supplier.index') }}"
                                        class="{{ request()->routeIs('suppliermanage.supplier.*') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>All Suppliers</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                    </ul>
                </li>

                {{-- <li class="menu-title"><span>Project Manage</span></li> --}}

                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-atom-2"></i>
                                <span>Project Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="{{ request()->routeIs('projectmanage.projects.*') ? 'display:block;' : '' }}">
                                <li>
                                    <a href="{{ route('projectmanage.projects.index') }}"
                                        class="{{ request()->routeIs('projectmanage.projects.*') ? 'active' : '' }}">
                                        <i class="ti ti-atom-2">
                                        </i><span>Projects</span>
                                    </a>
                                </li>

                                <li>

                                    <a href="{{ route('projectmanage.projectcategory.index') }}"
                                        class="{{ request()->routeIs('projectmanage.projectcategory.*') ? 'active' : '' }}">
                                        <i class="ti ti-list-check">
                                        </i>
                                        {{-- <span>Task & Progress Tracking</span> --}}
                                        <span>Project Category</span>
                                    </a>
                                </li>

                                <li>

                                    <a href="{{ route('projectmanage.workscope.index') }}"
                                        class="{{ request()->routeIs('projectmanage.workscope.*') ? 'active' : '' }}">
                                        <i class="ti ti-list-check">
                                        </i>
                                        {{-- <span>Task & Progress Tracking</span> --}}
                                        <span>Work Scope</span>
                                    </a>
                                </li>

                                <li hidden>

                                    <a href="{{ route('projectmanage.projectfiles.index') }}"
                                        class="{{ request()->routeIs('projectmanage.projectfiles.*') ? 'active' : '' }}">
                                        <i class="ti ti-list-check">
                                        </i>
                                        {{-- <span>Task & Progress Tracking</span> --}}
                                        <span>Project Files</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>


                <style>
                    .menu-selected>a {
                        color: red;
                        background: #ffecec;
                    }
                </style>
                {{-- <li class="menu-title"><span>Material Manage</span></li> --}}

                <li>
                    <ul>
                        <li class="submenu {{ request()->routeIs('material.*') ? 'menu-selected' : '' }}">
                            <a href="javascript:void(0);">
                                <i class="ti ti-icons"></i>
                                <span>Material Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            {{--  assets --}}
                            <ul style="{{ request()->routeIs('material.assets.*') ? 'display:block;' : '' }}">
                                <li>
                                    <a href="{{ route('material.assets.index') }}"
                                        class="{{ request()->routeIs('material.assets.*') ? 'active' : '' }}">
                                        <i class="ti ti-icons"></i>
                                        <span>Assets</span>
                                    </a>
                                </li>

                                {{-- Fixed assets mean assets --}}
                                <li>
                                    <a href="{{ route('material.fixedassets.index') }}"
                                        class="{{ request()->routeIs('material.fixedassets.*') ? 'active' : '' }}">
                                        <i class="ti ti-icons">
                                        </i><span>Fixed Assets</span>
                                    </a>
                                </li>
                                {{-- variable assets mean materials --}}
                                <li>
                                    <a href="{{ route('material.variableassets.index') }}"
                                        class="{{ request()->routeIs('material.variableassets.*') ? 'active' : '' }}">
                                        <i class="ti ti-icons">
                                        </i><span>Variable Assets</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="" class="">
                                        <i class="ti ti-users">
                                        </i><span>BQ</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>

                {{-- @can('asset_requests_menu') --}}
                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-user-shield"></i>
                                <span>Assets Requests</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="{{ request()->routeIs('engineer-requests.*') ? 'display:block;' : '' }}">
                                {{-- @can('engineer_requests') --}}
                                <li>
                                    <a href="{{ route('engineer-requests.index') }}"
                                        class="{{ request()->routeIs('engineer-requests.*') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>Engineer Requests</span>
                                    </a>
                                </li>
                                {{-- @endcan --}}
                                {{-- <li>
                                    <a href="{{ route('fixedAsset-request.index') }}"
                                        class="{{ request()->routeIs('fixedAsset-request.index') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>Resigned Employess</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- @endcan --}}



                {{-- <li class="menu-title"><span>Stock Manage</span></li> --}}

                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-building-factory"></i>
                                <span>Stock Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            {{-- <ul style="{{ request()->routeIs('warehouses.*') ? 'display:block;' : '' }}"> --}}
                            <ul
                                style="{{ request()->routeIs('warehouse.*') || request()->routeIs('warehouse-stocks') ? 'display:block;' : '' }}">

                                <li>
                                    <a href="{{ route('warehouse.index') }}"
                                        class="{{ request()->routeIs('warehouse.*') ? 'active' : '' }}">

                                        <i class="ti ti-users">

                                        </i><span>Warehouse</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('stock-movements.index') }}"
                                        class="{{ request()->routeIs('stock-movements.index') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>Stock Movements</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('warehouse-stocks.index') }}"
                                        class="{{ request()->routeIs('warehouse-stocks.*') ? 'active' : '' }}">
                                        <i class="ti ti-users"></i>
                                        <span>Warehouse Stocks</span>
                                    </a>
                                </li>



                            </ul>
                        </li>
                    </ul>
                </li>

                {{-- <li class="menu-title"><span>Equipment Manage</span></li> --}}

                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-database"></i>
                                <span>Purchase</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul
                                style="{{ request()->routeIs('purchase.*') || request()->routeIs('purchase') ? 'display:block;' : '' }}">
                                <li>
                                    <a href="{{ route('purchase.index') }}"
                                        class="{{ request()->routeIs('purchase.*') ? 'active' : '' }}">
                                        <i class="ti ti-database">
                                        </i><span>Purchase Order Lists</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('payment.purchase_payment') }}"  class="{{ request()->routeIs('payment.purchase_payment') ? 'active' : '' }}">
                                        <i class="ti ti-report-money">
                                        </i><span>Payment Process</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="" class="">
                                        <i class="ti ti-users">
                                        </i><span>Usage History</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>



                {{-- <li class="menu-title"><span>Engineer Manage</span></li> --}}
                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-user-shield"></i>
                                <span>Engineer Assigns</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="{{ request()->routeIs('engineers.*') ? 'display:block;' : '' }}">
                                <li>
                                    <a href="{{ route('engineers.index') }}"
                                        class="{{ request()->routeIs('engineers.*') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>All Engineer Assigns</span>
                                    </a>
                                </li>




                            </ul>
                        </li>
                    </ul>
                </li>

                {{-- <li class="menu-title"><span>User Manage</span></li> --}}

                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-user-shield"></i>
                                <span>User Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="{{ request()->routeIs('usermanage.*') ? 'display:block;' : '' }}">
                                <li>
                                    <a href="{{ route('usermanage.index') }}"
                                        class="{{ request()->routeIs('usermanage.*') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>All Users</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('resign-employees.index') }}"
                                        class="{{ request()->routeIs('resign-employees.index') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>Resigned Employess</span>
                                    </a>
                                </li>

                                {{-- <li>
                                    <a href="{{ route('engineerassign.index') }}" class="{{ request()->routeIs('engineerassign.*') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>Engineer Assign</span>
                                    </a>
                                </li> --}}

                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-user-shield"></i>
                                <span>Roles & Permissions</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul
                                style="{{ request()->routeIs('configuration.role.*') ? 'display:block;' : 'display:none;' }}">
                                <li>
                                    <a href="{{ route('configuration.role.index') }}"
                                        class="{{ request()->routeIs('configuration.role.*') ? 'active' : '' }}">
                                        Roles
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('configuration.permission.index') }}"
                                        class="{{ request()->routeIs('configuration.permission.*') ? 'active' : '' }}">
                                        </i><span>Permission</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>



            </ul>
        </div>
    </div>

</div>
