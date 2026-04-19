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

                <style>
                    .menu-selected>a {
                        color: red;
                        background: #ffecec;
                    }
                </style>
              
                {{-- <li class="menu-title"><span>User Manage</span></li> --}}

                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);">
                                <i class="ti ti-users"></i>
                                <span>Bank Management</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <ul style="{{ request()->routeIs('accounting.bankmanage.*') ? 'display:block;' : '' }}">
                                <li>
                                    <a href="{{ route('accounting.bankmanage.index') }}"
                                        class="{{ request()->routeIs('accounting.bankmanage.*') ? 'active' : '' }}">
                                        <i class="ti ti-users">
                                        </i><span>All Banks</span>
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
