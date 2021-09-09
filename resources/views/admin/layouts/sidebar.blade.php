<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}"> 
                    <a href="{{ route('dashboard') }}"><i data-feather="home"></i> <span>{{ __('sidebar.dashboard') }}</span></a>
                </li>

                
                {{-- Services --}}
                @if(auth()->user()->can('service-list') || auth()->user()->can('servicecategory-list'))
                    <li class="submenu">
                        <a class="#" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="layout"></i><span class="hide-menu">{{ __('sidebar.services') }}</span><span class="menu-arrow"></span>
                        </a>
                        
                        <ul style="display: none;">

                            @can('cmscategory-list')
                                <li>
                                    <a href="{{ route('servicecategories.index') }}" title="{{ __('sidebar.categories') }}" class="sidebar-link {{ request()->is('admin/servicecategories*') ? 'active' : '' }}">
                                        <span class="hide-menu">{{ __('sidebar.categories') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('cms-list')
                                <li>
                                    <a href="{{ route('services.index') }}" title="{{ __('sidebar.services') }}" class="sidebar-link {{ request()->is('admin/services*') ? 'active' : '' }}">
                                        <span class="hide-menu">{{ __('sidebar.services') }}</span>
                                    </a>
                                </li>
                            @endcan
                            
                        </ul>
                    </li>
                @endif
                {{-- CMS end --}}

                {{-- CMS --}}
                @if(auth()->user()->can('cms-list') || auth()->user()->can('cmscategory-list'))
                    <li class="submenu">
                        <a class="#" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="layout"></i><span class="hide-menu">{{ __('sidebar.cms') }}</span><span class="menu-arrow"></span>
                        </a>
                        
                        <ul style="display: none;">

                            @can('cmscategory-list')
                                <li>
                                    <a href="{{ route('cmscategories.index') }}" title="{{ __('sidebar.categories') }}" class="sidebar-link {{ request()->is('admin/cmscategories*') ? 'active' : '' }}">
                                        <span class="hide-menu">{{ __('sidebar.categories') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('cms-list')
                                <li>
                                    <a href="{{ route('cms.index') }}" title="{{ __('sidebar.pages') }}" class="sidebar-link {{ request()->is('admin/cmspages*') ? 'active' : '' }}">
                                        <span class="hide-menu">{{ __('sidebar.pages') }}</span>
                                    </a>
                                </li>
                            @endcan
                            
                        </ul>
                    </li>
                @endif
                {{-- CMS end --}}

                {{-- users --}}
                @if(auth()->user()->can('user-list') || auth()->user()->can('role-list') || auth()->user()->can('permission-list') || auth()->user()->can('user-activity'))
                    <li class="submenu">
                        <a class="#" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="user"></i><span class="hide-menu">{{ __('sidebar.users') }}</span><span class="menu-arrow"></span>
                        </a>
                        
                        <ul style="display: none;">

                            @can('user-list')
                                <li>
                                    <a href="{{ route('users.index') }}" title="{{ __('sidebar.users') }}" class="sidebar-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                                        <span class="hide-menu">{{ __('sidebar.users') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('role-list')
                                <li>
                                    <a href="{{ route('roles.index') }}" title="{{ __('sidebar.roles') }}" class="sidebar-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                                        <span class="hide-menu">{{ __('sidebar.roles') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('permission-list')
                                <li>
                                    <a href="{{ route('permissions.index') }}" title="{{ __('sidebar.permissions') }}" class="sidebar-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                                        <span class="hide-menu">{{ __('sidebar.permissions') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('user-activity')
                                <li>
                                    <a href="/admin/user-activity" title="{{ __('sidebar.user-activity') }}" class="sidebar-link {{ request()->is('admin/user-activity*') ? 'active' : '' }}">
                                        <span class="hide-menu">{{ __('sidebar.user-activity') }}</span>
                                    </a>
                                </li>
                            @endcan
                            
                        </ul>
                    
                    </li>
                @endif
                {{-- users end --}}

                {{--settings --}}
                @if(auth()->user()->can('file-manager') || auth()->user()->can('currency-list') || auth()->user()->can('websetting-edit') || auth()->user()->can('log-view'))
                    <li class="submenu">
                        <a class="" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="settings"></i><span class="hide-menu">{{ __('sidebar.settings') }}</span><span class="menu-arrow"></span>
                        </a>

                        <ul style="display: none;">
                            @can('currency-list')
                                <li>
                                    <a href="{{ route('currencies.index') }}" title="{{ __('sidebar.currencies') }}" class="sidebar-link {{ request()->is('admin/currencies*') ? 'active' : '' }}"><span class="hide-menu">{{ __('sidebar.currencies') }}</span></a>
                                </li>
                            @endcan

                            @can('websetting-edit')
                                <li>
                                    <a href="{{ route('settings.website.edit') }}" title="{{ __('sidebar.website-setting') }}" class="sidebar-link {{ request()->is('admin/settings/site-settings*') ? 'active' : '' }}"><span class="hide-menu">{{ __('sidebar.website-setting') }}</span></a>
                                </li>
                            @endcan

                            @can('file-manager')
                                <li>
                                    <a href="{{ route('filemanager.index') }}" title="{{ __('sidebar.file-manager') }}" class="sidebar-link {{ request()->is('admin/settings//file-manager*') ? 'active' : '' }}"><span class="hide-menu">{{ __('sidebar.file-manager') }}</span></a>
                                </li>
                            @endcan

                            @can('log-view')
                            <li>
                                <a href="/admin/log-reader" target="_blank" title="{{ __('sidebar.read-logs') }}" class="sidebar-link {{ request()->is('admin/log-reader*') ? 'active' : '' }}">
                                    <span class="hide-menu">{{ __('sidebar.read-logs') }}</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                @endif
                {{-- settings end --}}

            </ul>
        </div>
    </div>
</div>