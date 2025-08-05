<div class="sidebar-left sidebar-fixed">
    <div class="sidebar">
    <div class="sidebar-content">
    <div class="sidebar-header">
        <div class="sidebar-details">
        <h5 class="m-0 sidebar-title"><i class="material-icons app-header-icon text-top">settings</i> Settings
        </h5>
        </div>
    </div>
    <div id="sidebar-list" class="sidebar-menu list-group position-relative animate fadeLeft delay-1 ps">
            <div class="sidebar-list-padding app-sidebar" id="contact-sidenav">
            <ul class="contact-list display-grid">
                <li class="sidebar-title">Filters</li>
                <li class="{{ request()->routeIs('settings.index') ? 'active' : '' }}"><a href="{{ route('settings.index') }}" class="text-sub display-flex"><i class="material-icons mr-2"> star_border </i> Profile Information</a></li>
                <li class="{{ request()->routeIs('settings.edu') ? 'active' : '' }}"><a href="{{ route('settings.edu', 'user') }}" class="text-sub display-flex"><i class="material-icons mr-2"> star_border </i> Educations & Experience</a></li>
                <li class="{{ request()->routeIs('settings.skill') ? 'active' : '' }}"><a href="{{ route('settings.skill', 'user') }}" class="text-sub display-flex"><i class="material-icons mr-2"> star_border </i> Skills & Languages</a></li>
                <li class="{{ request()->routeIs('settings.social') ? 'active' : '' }}"><a href="{{ route('settings.social', 'user') }}" class="text-sub display-flex"><i class="material-icons mr-2"> star_border </i> Social & Facts</a></li>
                <li class="{{ request()->routeIs('settings.pass') ? 'active' : '' }}"><a href="{{ route('settings.pass', 'user') }}" class="text-sub display-flex"><i class="material-icons mr-2"> star_border </i> Change Password</a></li>
            </ul>
            </div>
        </div>
    </div>
    </div>
    </div>