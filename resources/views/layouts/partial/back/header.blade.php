<header class="page-topbar" id="header">
      <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-purple-deep-orange gradient-shadow">
          <div class="nav-wrapper">
            <ul class="navbar-list right">
              <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
              <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="
                {{ asset('storage/' . $settings->photo) }}" alt="avatar"><i></i></span></a></li>
            </ul>

            <!-- profile-dropdown-->
            <ul class="dropdown-content" id="profile-dropdown">
              <li><a class="grey-text text-darken-1" href="{{ route('settings.index') }}"><i class="material-icons">settings</i> Settings</a></li>
              <li class="divider"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="grey-text text-darken-1" :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();"><i class="material-icons">keyboard_tab</i> {{ __('Log Out') }}</a>
                </form>
            </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>