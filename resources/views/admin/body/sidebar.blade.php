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



                <li class="menu-title"><span>Client Manage</span></li>

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
                                    <a href="{{ route('suppliermanage.supplier.index') }}" class="{{ request()->routeIs('suppliermanage.supplier.*') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>All Suppliers</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-title"><span>Project Manage</span></li>

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

                                <li hidden>

                                    <a href="{{ route('projectmanage.projectcategory.index') }}"
                                        class="{{ request()->routeIs('projectmanage.projectcategory.*') ? 'active' : '' }}">
                                        <i class="ti ti-list-check">
                                        </i>
                                        {{-- <span>Task & Progress Tracking</span> --}}
                                        <span>Project Category</span>
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
                <li class="menu-title"><span>Material Manage</span></li>

                <li>
                    <ul>
                        <li class="submenu {{ request()->routeIs('material.*') ? 'menu-selected' : '' }}">
                            <a href="javascript:void(0);">
                                <i class="ti ti-icons"></i>
                                <span>Material Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            {{-- fixed assets mean assets --}}
                            <ul style="{{ request()->routeIs('material.fixedassets.*') ? 'display:block;' : '' }}">
                                <li>
                                    <a href="{{ route('material.fixedassets.index') }}"
                                        class="{{ request()->routeIs('material.fixedassets.*') ? 'active' : '' }}">
                                        <i class="ti ti-icons"></i>
                                        <span>Fixed Assets</span>
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
                                        </i><span>Work Scope</span>
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

                <li class="menu-title"><span>Stock Manage</span></li>

                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-building-factory"></i>
                                <span>Stock Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="{{ request()->routeIs('warehouse.*') ? 'display:block;' : '' }}">
                                <li>
                                    <a href="{{ route('warehouse.index') }}" class="{{ request()->routeIs('warehouse.*') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>Warehouse</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="" class="">
                                        <i class="ti ti-users">
                                        </i><span>Stock In/ Stock out</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-title"><span>Equipment Manage</span></li>

                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-database"></i>
                                <span>Equipment Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="">
                                <li>
                                    <a href="" class="">
                                        <i class="ti ti-database">
                                        </i><span>Equipment Lists</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="" class="">
                                        <i class="ti ti-users">
                                        </i><span>Equipment Assignment</span>
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


                <li class="menu-title"><span>User Manage</span></li>

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

                                <li>
                                    <a href="" class="">
                                        <i class="ti ti-users">
                                        </i><span>Engineer Assigned</span>
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
                                <span>Roles & Permissions</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="{{ request()->routeIs('configuration.role.*') ? 'display:block;' : 'display:none;' }}">
                                <li>
                                    <a href="{{ route('configuration.role.index') }}" class="{{ request()->routeIs('configuration.role.*') ? 'active' : '' }}">
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
