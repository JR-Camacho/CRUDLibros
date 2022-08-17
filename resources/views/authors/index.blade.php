@extends("../layouts.layout_buscador")

@section("header")
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav_height">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="{{url('/')}}"><i class="fa-solid fa-book icon"></i></a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('books')}}">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('authors')}}">Authors</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="{{route('authors.index')}}" method="get">
                    <input class="form-control me-2" type="search" name="text" placeholder="Ex: Miguel de Cervantes" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
@endsection

@section("main")
<h1 class="title display-1">Authors</h1>
<a class="btn btn-primary btn-lg btn_new" href="{{url('/authors/create')}}" role="button">NEW</a>
<article class="books_container">
@if(count($authors) <= 0)
  <div class="alert alert-info alerta" role="alert">
    No authors found. Try again
  </div>
  @else
  @foreach($authors as $author)
  <div class="card card_author">
    <img src="images/authors/{{$author->photo_url}}" class="card-img-top img" alt="{{$author->name}}">
    <div class="card-body">
      <h5 class="card-title">{{$author->name . " " . $author->surnames}}</h5>
      <p class="card-text">{{$author->description}}</p>
      <div class="buttons">
        <a href="{{route('authors.show', $author->id)}}" class="btn btn-info">See More</a>
        <a href="{{route('authors.edit', $author->id)}}" class="btn btn-warning"><i class="fa-solid fa-marker"></i></a>
        <form action="{{route('authors.destroy', $author->id)}}" method="post">
          @csrf
          @method('delete')
          <input type="hidden" name="_method" value="delete">
          <button type="submit" class="btn btn-danger" onclick="return window.confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
  @endif
</article>
{{$authors->links()}}
@endsection