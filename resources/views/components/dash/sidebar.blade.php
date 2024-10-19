<nav class="navbar navbar-vertical navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">

                <li class="nav-item">
                    <div class="nav-item-wrapper"><a
                            class="nav-link {{ request()->is('dashboard') ? 'active' : '' }} label-1"
                            href="{{ route('dashboard') }}" role="button" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="pie-chart"></span></span><span class="nav-link-text-wrapper"><span
                                        class="nav-link-text">Dashboard</span></span>
                            </div>
                        </a>
                    </div>


                    @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
                        <div class="nav-item-wrapper">
                            <a class="nav-link dropdown-indicator label-1 {{ request()->routeIs('users.*') ? '' : 'collapsed' }}"
                                href="#nv-user" role="button" data-bs-toggle="collapse"
                                aria-expanded="{{ request()->is('kintil/*') ? 'true' : 'false' }}" aria-controls="nv-user">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-indicator-icon-wrapper"><span
                                            class="fas fa-caret-right dropdown-indicator-icon"></span></div><span
                                        class="nav-link-icon"><span data-feather="users"></span></span><span
                                        class="nav-link-text">Users</span>
                                </div>
                            </a>
                            <div class="parent-wrapper label-1">
                                <ul class="nav collapse parent {{ request()->routeIs('users.*') ? 'show' : '' }}"
                                    data-bs-parent="#navbarVerticalCollapse" id="nv-user">
                                    <li class="collapsed-nav-item-title d-none">Users
                                    </li>
                                    <li class="nav-item"><a
                                            class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
                                            href="{{ route('users.index') }}">
                                            <div class="d-flex align-items-center"><span class="nav-link-text">
                                                    List Users
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    @can('user-create')
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->routeIs('users.create') ? 'active' : '' }}"
                                                href="{{ route('users.create') }}">
                                                <div class="d-flex align-items-center"><span class="nav-link-text">Add
                                                        User</span>
                                                </div>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </div>
                    @endcan
                    @canany(['role-list', 'role-create', 'role-edit', 'role-delete'])
                        <div class="nav-item-wrapper">
                            <a class="nav-link dropdown-indicator label-1 {{ request()->routeIs('roles.*') ? '' : 'collapsed' }}"
                                href="#nv-role" role="button" data-bs-toggle="collapse"
                                aria-expanded="{{ request()->is('kintil/*') ? 'true' : 'false' }}" aria-controls="nv-role">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-indicator-icon-wrapper"><span
                                            class="fas fa-caret-right dropdown-indicator-icon"></span></div>
                                    <span class="nav-link-icon"><span data-feather="lock"></span></span>
                                    <span class="nav-link-text">Roles</span>
                                </div>
                            </a>
                            <div class="parent-wrapper label-1">
                                <ul class="nav collapse parent {{ request()->routeIs('roles.*') ? 'show' : '' }}"
                                    data-bs-parent="#navbarVerticalCollapse" id="nv-role">
                                    <li class="collapsed-nav-item-title d-none">Roles</li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}"
                                            href="{{ route('roles.index') }}">
                                            <div class="d-flex align-items-center"><span class="nav-link-text">List
                                                    Roles</span></div>
                                        </a>
                                    </li>

                                    @can('role-create')
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->routeIs('roles.create') ? 'active' : '' }}"
                                                href="{{ route('roles.create') }}">
                                                <div class="d-flex align-items-center"><span class="nav-link-text">Add
                                                        Role</span></div>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </div>
                    @endcanany


                    <!-- parent pages-->
                    <div class="nav-item-wrapper">
                        <a class="nav-link dropdown-indicator label-1 {{ request()->routeIs('profile.*') ? '' : 'collapsed' }}"
                            href="#nv-profile" role="button" data-bs-toggle="collapse"
                            aria-expanded="{{ request()->is('kintil/*') ? 'true' : 'false' }}"
                            aria-controls="nv-profile">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"><span
                                        class="fas fa-caret-right dropdown-indicator-icon"></span></div><span
                                    class="nav-link-icon"><span data-feather="user"></span></span><span
                                    class="nav-link-text">Account</span>
                            </div>
                        </a>
                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent {{ request()->routeIs('profile.*') ? 'show' : '' }}"
                                data-bs-parent="#navbarVerticalCollapse" id="nv-profile">
                                <li class="collapsed-nav-item-title d-none">Account
                                </li>
                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('profile.index') ? 'active' : '' }}"
                                        href="{{ route('profile.index') }}">
                                        <div class="d-flex align-items-center"><span
                                                class="nav-link-text">Profile</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item"><a
                                        class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}"
                                        href="{{ route('profile.edit') }}">
                                        <div class="d-flex align-items-center"><span class="nav-link-text">Edit
                                                Profile</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button
            class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center">
            <span class="uil uil-left-arrow-to-left fs-8"></span>
            <span class="uil uil-arrow-from-right fs-8"></span>
            <span class="navbar-vertical-footer-text ms-2">
                Collapsed
                View
            </span>
        </button>
    </div>
</nav>
