<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand logo -->
    <a href="{{ route('index') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link {{ Route::currentRouteName() == 'index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer"></i>
                        <p>@lang('system.home')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('employees.index') }}" class="nav-link {{ Route::currentRouteName() == 'employees.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-rectangle-list"></i>
                        <p>@lang('system.employees')</p>
                    </a>
                </li>

                @can('permission', 'system_groups_index')
                    <li class="nav-item">
                        <a href="{{ route('groups.index') }}" class="nav-link {{ Route::currentRouteName() == 'groups.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-tag"></i>
                            <p>@lang('system.groups')</p>
                        </a>
                    </li>
                @endcan

                @can('permission', 'system_users_index')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>@lang('system.users')</p>
                        </a>
                    </li>
                @endcan
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->

</aside>