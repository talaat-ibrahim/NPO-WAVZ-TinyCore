<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('Menu')</li>
                @if(auth()->user()->can('Branche_read-home'))
                    <li>
                        <a href="{{ route('home') }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboards">
                                @lang('Statictis')
                            </span>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->can('Branche_read-users'))
                <li>
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Users')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-roles'))
                <li>
                    <a href="{{ route('roles.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Roles')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-terminal'))
                <li>
                    <a href="{{ route('terminals.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Terminal')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-branches'))
                <li>
                    <a href="{{ route('branches.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Branches')</span>
                    </a>
                </li>
                @endif

                <li class="menu-title" key="t-menu">@lang('Lookups')</li>
                @if(auth()->user()->can('Branche_read-network'))
                <li>
                    <a href="{{ route('networks.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Network Providers')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-project'))
                <li>
                    <a href="{{ route('projects.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Projects')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-branch-level'))
                <li>
                    <a href="{{ route('levels.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Branch Levels')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-line-type'))
                <li>
                    <a href="{{ route('line-types.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Connecting line types')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-router-type'))
                <li>
                    <a href="{{ route('routers.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Routers types')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-switch-model'))
                <li>
                    <a href="{{ route('switch-model.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Switch model')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-ups-installation'))
                <li>
                    <a href="{{ route('ups-installations.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Ups Installation')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-line-capacity'))
                <li>
                    <a href="{{ route('line-capacities.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Line Capacitie')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-entuity-status'))
                <li>
                    <a href="{{ route('entuity-status.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Entuity Status')</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Branche_read-government'))
                <li>
                    <a href="{{ route('government.index') }}" class="waves-effect">
                        <i class="bx bxs-user-pin"></i>
                        <span key="t-contacts">@lang('Government')</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
