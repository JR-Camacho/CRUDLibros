@extends("../layouts.layout_buscador")

@section("header")
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav_height">
        <div class="container-fluid">
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
                <form class="d-flex" role="search" action="{{route('books.index')}}" method="get">
                    <input class="form-control me-2" type="search" name="text" placeholder="Ex: El Amante Liberal" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
@endsection

@section("main")

<h1 class="title display-1">Books</h1>
<a class="btn btn-primary btn-lg btn_new" href="{{url('/books/create')}}" role="button">NEW</a>
<article class="books_container">
  @if(count($books) <= 0)
  <div class="alert alert-info alerta" role="alert">
    No books found. Try again
  </div>
  @else
  @foreach($books as $book)
  <div class="card card_book">
    @if($book->front_url)
    <img src="images/books/{{$book->front_url}}" class="card-img-top img" alt="{{$book->title}}">
    @else
    <img src="images/sinimagen.jpg" class="card-img-top img" alt="{{$book->title}}">
    @endif
    <div class="card-body">
      <h5 class="card-title">{{$book->title}}</h5>
      <p class="card-text">{{$book->description}}</p>
      <div class="buttons">
        <a href="{{route('books.show', $book->id)}}" class="btn btn-info">See More</a>
        <a href="{{route('books.edit', $book->id)}}" class="btn btn-warning"><i class="fa-solid fa-marker"></i></a>
        <form action="{{route('books.destroy', $book->id)}}" method="post" id="form_delete" class="form-delete">
          @csrf
          @method('delete')
          <input type="hidden" name="_method" value="delete">
          <button type="submit" class="btn btn-danger" id="btn_eliminar" onclick=" return window.confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
  @endif
</article>
{{$books->links()}}
@endsection

