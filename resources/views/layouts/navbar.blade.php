<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="/">
        Paws
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
    <a class="navbar-item" href="{{route('home')}}">
        Home
      </a>

      <a class="navbar-item" href="/pets">
        Pet Search
      </a>
 
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
        <a class="button is-primary" href="{{route('register')}}">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light" href="{{route('login')}}">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>