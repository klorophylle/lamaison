<nav class="navbar navbar-light bg-info">
  <span class="navbar-brand mb-0 h1">La maison</span>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    @if(Route::is('admin.*') == false)
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Accueil<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('soldes')}}">Soldes<span class="sr-only">(current)</span></a>
      </li>
      
      @forelse($categories as $id => $title)
      <li class="nav-item">
        <a class="nav-link" href="{{url('category', $id)}}">{{$title}}</a>
      </li>
      @empty
      <li class="nav-item">Vide</li>
      @endforelse
      @else
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Retour à l'accueil<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/admin')}}">Dashboard<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.create')}}">Ajouter un produit<span class="sr-only">(current)</span></a>
      </li>
      @endif

      </ul>
  </div>
</nav>