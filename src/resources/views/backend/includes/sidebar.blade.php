<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <img class="c-sidebar-brand-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSkT6lj19RgF_6f4SAJtDzx8DWXjIQOtTZkAw&usqp=CAU" height="48px">
        
        <img class="c-sidebar-brand-minimized" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSkT6lj19RgF_6f4SAJtDzx8DWXjIQOtTZkAw&usqp=CAU" height="46px">
    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li>

        @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.user.list') ||
                $logged_in_user->can('admin.access.user.deactivate') ||
                $logged_in_user->can('admin.access.user.reactivate') ||
                $logged_in_user->can('admin.access.user.clear-session') ||
                $logged_in_user->can('admin.access.user.impersonate') ||
                $logged_in_user->can('admin.access.user.change-password')
            )
        )
            <li class="c-sidebar-nav-title">@lang('System')</li>
            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-settings"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Master Management')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                    <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.dzongkhag.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Dzongkhag')"
                                :active="activeClass(Route::is('admin.dzongkhags.index.*'), 'c-active')" />
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.zone.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Zone')"
                                :active="activeClass(Route::is('admin.zone.index.*'), 'c-active')" />
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.sub-zone.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Sub Zone')"
                                :active="activeClass(Route::is('admin.sub-zone.index.*'), 'c-active')" />
                        </li>
                    @endif
                </ul>
            </li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-house"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('House Hold')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        href="{{route('admin.household-detail.index')}}"
                        class="c-sidebar-nav-link"
                        :text="__('Registered Household')" 
                        :active="activeClass(Route::is('admin.household-detail.*'), 'c-active')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        
                    <x-utils.link
                    href="{{route('admin.household-detail.index')}}"
                    class="c-sidebar-nav-link"
                    :text="__('Update Household')"
                    :active="activeClass(Route::is('admin.household-detail.*'), 'c-active')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-house"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Building Management')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                        href="{{route('admin.building.index')}}"
                        class="c-sidebar-nav-link"
                        :text="__('List Buildings')" 
                        :active="activeClass(Route::is('admin.building.*'), 'c-active')" />
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-item {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="{{route('admin.qr-code.create')}}"
                    icon="c-sidebar-nav-icon cil-qr-code"
                    class="c-sidebar-nav-link"
                    :text="__('Generate QR Code')" />
            </li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-house"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Scan Logs'  )" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('admin.daily-scan-log.index')"
                            class="c-sidebar-nav-link"
                            :text="__('Daily Scan Logs')"
                            :active="activeClass(Route::is('admin.daily-scan-log.*'), 'c-active')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('admin.all-scan-log.index')"
                            class="c-sidebar-nav-link"
                            :text="__('All Scan Logs')"
                            :active="activeClass(Route::is('admin.all-scan-log.*'), 'c-active')" />
                    </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-user"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Access')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.user.index')"
                                class="c-sidebar-nav-link"
                                :text="__('User Management')"
                                :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                        </li>
                    @endif

                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.role.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Role Management')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    @endif
                    
                </ul>
            </li>
        @endif

        @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-list"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Logs')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Dashboard')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::logs.list')"
                            class="c-sidebar-nav-link"
                            :text="__('Logs')" />
                    </li>
                </ul>
            </li>
        @endif
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
