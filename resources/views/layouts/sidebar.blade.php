<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>@lang('translation.menu')</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span>@lang('translation.dashboards')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link">@lang('translation.analytics')</a>
                            </li>
                            
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->


                <!-- Catalog-->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCatalog" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarCatalog">
                        <i class="ri-apps-2-line"></i> <span>@lang('translation.catalogs')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCatalog">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('status.index') }}" class="nav-link">@lang('translation.status')</a>
                            </li>                                                      
                            <li class="nav-item">
                                <a href="{{route('categories.index')}}" class="nav-link">@lang('translation.category')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('denominations.index')}}" class="nav-link">@lang('translation.denominations')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('laboratories.index')}}" class="nav-link">@lang('translation.laboratories')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('saletypes.index')}}" class="nav-link">@lang('translation.saletypes')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('pharmaceuticalforms.index')}}" class="nav-link">@lang('translation.pharmaceuticalforms')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('symptoms.index')}}" class="nav-link">@lang('translation.symptoms')</a>
                            </li>
                        </ul>
                    </div>            
                </li>
                
                <!-- UserMenu-->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUser" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUser">
                        <i class="ri-account-circle-line"></i> <span>@lang('translation.managerusers')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUser">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">@lang('translation.users')</a>
                            </li>                           
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link">@lang('translation.roles')</a>
                            </li>
                            {{--  <li class="nav-item">
                                <a href="pages-team" class="nav-link">@lang('translation.permissions')</a>
                            </li> --}}
                        </ul>
                    </div>            
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSupplier" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUser">
                        <i class="ri-contacts-line"></i> <span>@lang('translation.managersuppliers')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSupplier">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{-- {{ route('users.index') }} --}}" class="nav-link">@lang('translation.suppliers')</a>
                            </li>                           
                           {{--  <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link">@lang('translation.roles')</a>
                            </li> --}}
                            {{--  <li class="nav-item">
                                <a href="pages-team" class="nav-link">@lang('translation.permissions')</a>
                            </li> --}}
                        </ul>
                    </div>            
                </li>




            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
