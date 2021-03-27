<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ route('home') }}"><i class="fas fa-home"></i>Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('articles') }}">Articles </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        @if (Auth::user())
          @if (Auth::user()->role === 'ADMIN')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('articles.index') }}">Espace admin</a>
            </li>
          @endif
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn">Déconnexion</button>
            </form>
          </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Me connecter </a>
        </li>
        @endif
      </ul>
    </div>
  </nav>