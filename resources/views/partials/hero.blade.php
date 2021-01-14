<section class="hero is-primary is-medium">
  <!-- Hero head: will stick at the top -->
  <div class="hero-head">
    <nav class="navbar is-primary">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="{{ route('home') }}">
            <img src="https://logos-download.com/wp-content/uploads/2016/09/Laravel_logo_wordmark_logotype.png" style="filter: brightness(0) invert(1)" alt="Logo">
          </a>
          <span class="navbar-burger" data-target="navbarMenuHeroA">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="navbarMenuHeroA" class="navbar-menu">
          <div class="navbar-end">
            <a class="navbar-item {{ Route::currentRouteName() == 'home' ? 'is-active':'' }}" href="{{ route('home') }}">
              Home
            </a>
            <a class="navbar-item {{ Route::currentRouteName() == 'posts.index' ? 'is-active':'' }}" href="{{ route('posts.index') }}">
              Blog Posts
            </a>
            <a class="navbar-item {{ Route::currentRouteName() == 'posts.create' ? 'is-active':'' }}" href="{{ route('posts.create') }}">
              Create Post
            </a>
            <a class="navbar-item {{ Route::currentRouteName() == 'about' ? 'is-active':'' }}" href="{{ route('about') }}">
              About
            </a>
            <a class="navbar-item {{ Route::currentRouteName() == 'contact' ? 'is-active':'' }}" href="{{ route('contact') }}">
              Contact
            </a>
            @if (Auth::guest())
              <a class="navbar-item " href="{{ route('login') }}">Login</a>
              <a class="navbar-item " href="{{ route('register') }}">Register</a>
            @else
              <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                <div class="navbar-dropdown">
                  <a class="navbar-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        @yield('title')
      </h1>
      <h2 class="subtitle">
        @yield('subtitle', 'This is where you learn about Backend')
      </h2>
    </div>
  </div>
</section>