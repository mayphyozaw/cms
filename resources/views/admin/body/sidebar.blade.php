<div class="sidebar" id="sidebar">

    <!-- Start Logo -->
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


        <!-- Sidebar Menu Close -->
        <button class="sidebar-close">
            <i class="ti ti-x align-middle"></i>
        </button>
    </div>
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

                {{-- <li class="menu-title"><span>UserManage</span></li>
                <li>
                    <ul>
                        <li><a href="{{ route('dashboard') }}"
                                class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="ti ti-dashboard">
                                </i><span>User Manage</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}

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

                            <ul style="{{ request()->routeIs('role.*') ? 'display:block;' : 'display:none;' }}">
                                <li>
                                    <a href="#"
                                        class="{{ request()->routeIs('role.*') ? 'active' : '' }}">
                                        Roles
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
