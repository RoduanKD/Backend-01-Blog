<section class="hero is-primary is-medium">
  <!-- Hero head: will stick at the top -->
  <div class="hero-head">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item">
            <img src="https://bulma.io/images/bulma-type-white.png" alt="Logo">
          </a>
          <span class="navbar-burger" data-target="navbarMenuHeroA">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="navbarMenuHeroA" class="navbar-menu">
          <div class="navbar-end">
            <a class="navbar-item is-active" href="{{ route('home') }}">
              Home
            </a>
            <a class="navbar-item" href="{{ route('posts.index') }}">
              Blog Posts
            </a>
            <a class="navbar-item" href="{{ route('about') }}">
              About
            </a>
            <a class="navbar-item" href="{{ route('contact') }}">
              Contact
            </a>
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