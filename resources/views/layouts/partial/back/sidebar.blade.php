<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full sidenav-active-rounded">
    <div class="brand-sidebar">
      <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{ route('dashboard') }}"><span class="logo-text hide-on-med-and-down">{{ $user->name }}</span></a></h1>
    </div>

    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
      <li class="bold mt-3 {{ request()->routeIs('dashboard') ? 'active open' : '' }}">
        <a class="waves-effect waves-cyan bold {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="material-icons">apps</i><span class="menu-title" data-i18n="">Dashboard</span></a>
      </li>

      <li class="bold {{ request()->routeIs('service.*') ? 'active open' : '' }}"><a class="waves-effect waves-cyan bold {{ request()->routeIs('service.*') ? 'active' : '' }}" href="{{ route('service.index') }}"><i class="material-icons">explore</i><span class="menu-title" data-i18n="">Service</span></a>
      </li>

      <li class="bold {{ request()->routeIs('projects.*') ? 'active open' : '' }}"><a class="waves-effect waves-cyan bold {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}"><i class="material-icons">local_parking</i><span class="menu-title" data-i18n="">Projects</span></a>
      </li>

      <li class="bold {{ request()->routeIs('teams.*') ? 'active open' : '' }}"><a class="waves-effect waves-cyan bold {{ request()->routeIs('teams.*') ? 'active' : '' }}" href="{{ route('teams.index') }}"><i class="material-icons">people</i><span class="menu-title" data-i18n="">Team Members</span></a>
      </li>

      <li class="bold {{ request()->routeIs('testimonials.*') ? 'active open' : '' }}"><a class="waves-effect waves-cyan bold {{ request()->routeIs('testimonials.*') ? 'active' : '' }}" href="{{ route('testimonials.index') }}"><i class="material-icons">comment</i><span class="menu-title" data-i18n="">Testimonials</span></a>
      </li>

      <li class="bold {{ request()->routeIs('partners.*') ? 'active open' : '' }}"><a class="waves-effect waves-cyan bold {{ request()->routeIs('partners.*') ? 'active' : '' }}" href="{{ route('partners.index') }}"><i class="material-icons">thumbs_up_down</i><span class="menu-title" data-i18n="">Partners</span></a>
      </li>

      <li class="bold {{ request()->routeIs('articles.*') ? 'active open' : '' }}"><a class="waves-effect waves-cyan bold {{ request()->routeIs('articles.*') ? 'active' : '' }}" href="{{ route('articles.index') }}"><i class="material-icons">art_track</i><span class="menu-title" data-i18n="">Articles</span></a>
      </li>

      <li class="bold {{ request()->routeIs('settings.*') ? 'active open' : '' }}"><a class="waves-effect waves-cyan bold {{ request()->routeIs('settings.*') ? 'active' : '' }}" href="{{ route('settings.index') }}"><i class="material-icons">settings_applications</i><span class="menu-title" data-i18n="">Settings</span></a>
      </li>

      <li class="bold {{ request()->routeIs('messages.*') ? 'active open' : '' }}"><a class="waves-effect waves-cyan bold {{ request()->routeIs('messages.*') ? 'active' : '' }}" href="{{ route('messages.index') }}"><i class="material-icons">message</i><span class="menu-title" data-i18n="">Messages</span></a>
      </li>
    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
  </aside>