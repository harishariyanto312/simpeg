<ul class="nav nav-pills">
    @can('permission', 'system_settings_profile')
        <li class="nav-item">
            <a href="{{ route('admin.user_settings.profile') }}" class="nav-link {{ Route::currentRouteName() == 'admin.user_settings.profile' ? 'active' : '' }}">@lang('system.profile')</a>
        </li>
    @endcan
    @can('permission', 'system_settings_password')
        <li class="nav-item">
            <a href="{{ route('admin.user_settings.password') }}" class="nav-link {{ Route::currentRouteName() == 'admin.user_settings.password' ? 'active' : '' }}">@lang('system.password')</a>
        </li>
    @endcan
    @can('permission', 'system_settings_avatar')
        <li class="nav-item">
            <a href="{{ route('admin.user_settings.avatar') }}" class="nav-link {{ Route::currentRouteName() == 'admin.user_settings.avatar' ? 'active' : '' }}">@lang('system.avatar')</a>
        </li>
    @endcan
</ul>