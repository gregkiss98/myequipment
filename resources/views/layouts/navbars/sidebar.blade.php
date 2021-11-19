<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      {{ __('Equipment in my Street') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Main page') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'tools' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('tools.index') }}">
          <i class="material-icons">carpenter</i>
            <p>{{ __('Tool list') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'events' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('events.index') }}">
          <i class="material-icons">event</i>
            <p>{{ __('Event List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'about' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('about') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('About') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="material-icons">manage_accounts</i>
          <p>{{ __('User profile') }}</p>
          </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="{{ route('upgrade') }}">
          <i class="material-icons text-white">favorites</i>
          <p>{{ __('Support us!') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
