<nav class="navbar navbar-expand-lg navbar-dark  bg-primary rounded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
  data-target="#navBar" aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navBar">
    <a class="navbar-brand" href="#">Nav Bar - Laravel</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li @if($current=="home")class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/">Home</a>
      </li>
      <li @if($current=="produtos")class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/produtos">Produtos</a>
      </li>
      <li @if($current=="categorias")class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/categorias">Categorias</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>