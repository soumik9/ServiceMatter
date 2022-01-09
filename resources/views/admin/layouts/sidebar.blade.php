<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}"> 
                    <a href="{{ route('dashboard') }}"><i data-feather="home"></i> <span>{{ __('sidebar.dashboard') }}</span></a>
                </li>

                {{-- service provider profile --}}
                @if(auth()->user()->can('customer-menu'))
                    @can('customer-menu')
                        <li class="{{ (request()->is('customer/orders*')) ? 'active' : '' }}"> 
                            <a href="{{ route('customer.orders.index') }}"><i data-feather="archive"></i> <span>{{ __('sidebar.orders') }}</span></a>
                        </li>

                        <li class="{{ (request()->is('customer/hires*')) ? 'active' : '' }}"> 
                            <a href="{{ route('customer.hires.index') }}"><i data-feather="check-square"></i> <span>{{ __('sidebar.hires') }}</span></a>
                        </li>
                    @endcan
                @endif

                {{-- service provider profile --}}
                @if(auth()->user()->can('provider-menu'))
                    @can('provider-menu')
                        <li class="{{ (request()->is('provider/profiles*')) ? 'active' : '' }}"> 
                            <a href="{{ route('profiles.index') }}"><i data-feather="trello"></i> <span>{{ __('sidebar.profile') }}</span></a>
                        </li>
                    @endcan
                    @can('provider-menu')
                        <li class="{{ (request()->is('provider/hires*')) ? 'active' : '' }}"> 
                            <a href="{{ route('provider.hire.index') }}"><i data-feather="check-square"></i> <span>{{ __('sidebar.hires') }}</span></a>
                        </li>
                    @endcan
                @endif

                
                {{-- admin order --}}
                @if(auth()->user()->can('order-list') || auth()->user()->can('order-view') || auth()->user()->can('order-edit'))
                    <li class="{{ (request()->is('admin/orders*')) ? 'active' : '' }}"> 
                        <a href="{{ route('admin.orders.index') }}"><i data-feather="check-square"></i> <span>{{ __('sidebar.orders') }}</span></a>
                    </li>
                @endif

                {{-- admin hire --}}
                @if(auth()->user()->can('hire-list') || auth()->user()->can('hire-view') || auth()->user()->can('hire-edit'))
                    <li class="{{ (request()->is('admin/hires*')) ? 'active' : '' }}"> 
                        <a href="{{ route('admin.hires.index') }}"><i data-feather="archive"></i> <span>{{ __('sidebar.hires') }}</span></a>
                    </li>
                @endif

                {{-- slides --}}
                @if(auth()->user()->can('slide-list'))
                    @can('slide-list')
                    <li class="{{ (request()->is('admin/slides*')) ? 'active' : '' }}"> 
                        <a href="{{ route('slides.index') }}"><i data-feather="airplay"></i> <span>{{ __('sidebar.slides') }}</span></a>
                    </li>
                    @endcan
                @endif

                
                {{-- Services --}}
                @if(auth()->user()->can('service-list') || auth()->user()->can('servicecategory-list'))
                    <li class="submenu">
                        <a class="#" href="javascript:void(0)" aria-expanded="false">
                            <i data-feather="aperture"></i><span class="hide-menu">{{ __('sidebar.services') }}</span><span class="menu-arrow"></span>
                        </a>
                        
                        <ul style="display: none;">

                            @can('servicecategory-list')
                                <li>
                                    <a href="{{ route('servicecategories.index') }}" title="{{ __('sidebar.categories') }}" class="sidebar-link {{ request()->is('admin/servicecategories*') ? 'active' : '' }}">
                                        <span class="hide-menu">{{ __('sidebar.categories') }}</span>
                                    </a>
                                </li>
                            @endcan

                            @can('service-list')
                                <li>
                                    <a href="{{ route('services.index') }}" title="{{ __('sidebar.services') }}" class="sidebar-link {{ request()->is('admin/services*') ? 'active' : '' }}">
                                        <span class="hide-menu">{{ __('sidebar.services') }}</span>
                                    </a>
                                </li>
                            @endcan
                            
                        </ul>
                    </li>
                @endif
                {{-- Services end --}}

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