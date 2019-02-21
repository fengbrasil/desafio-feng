<ul id="user-menu" class="dropdown-content">
  <li><a href="#" onclick="document.getElementById('logout-form').submit();">Sair</a></li>
  <form id="logout-form" method="post" action="{{ route('logout') }}" style="display:none;">
    @csrf
  </form>
</ul>
<nav>
  <div class="nav-wrapper">
    <ul class="left">
      <li>
        <a href="{{ Auth::user() ? route('home') : route('welcome') }}">
          <i class="fas fa-calendar-check"></i>
        </a>
      </li>
    </ul>
    <ul class="right">
      @guest
        <li><a href="{{ route('login') }}">Entrar</a></li>
        <li><a href="{{ route('register') }}">Registrar</a></li>
      @endguest
      @auth
        <li>
          <a href="#" class="dropdown-trigger flex items-center justify-center" data-target="user-menu">
            {{ Auth::user()->getFirstName() }}
            <i class="fas fa-chevron-down ml-2"></i>
          </a>
        </li>
      @endauth
    </ul>
  </div>
</nav>