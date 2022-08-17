@extends("./layouts.layout_buscador")

@section("header")
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav_height">
        <div class="container-fluid nav_h">
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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" disabled>
                    <button class="btn btn-outline-success" type="submit" disabled>Search</button>
                </form>
            </div>
        </div>
    </nav>
@endsection

@section("main")
<h1 class="title title_welcome display-1">Books Register</h1>
<h2 class="subtitle display-5">¡You can register all the books and authors you want and whenever you want!</h2>
<div class="books_container">
    @foreach($books as $book)
    <div class="card mb-3 card_welcome" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4 cont_image">
                <img src="images/books/{{$book->front_url}}" class="img-fluid rounded-start img_welcome" alt="{{$book->title}}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$book->title}}</h5>
                    <p class="card-text">{{$book->description}}</p>
                    <p class="card-text"><small class="text-muted">{{$book->created_at}}</small></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<h3 class="display-6 sub_subtitle">Phrases and descriptions of some authors</h2>
<div class="carusel_container">
<div id="carouselExampleCaptions" class="carousel slide carusel" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    @foreach($authors as $author)
    <div class="carousel-item active" data-bs-interval="5000">
      <img src="images/old-books-with-white-background-and-copy-space.jpg" class="d-block w-100" alt="{{$author->name . ' ' . $author->surnames}}">
      <div class="carousel-caption d-md-block cap_carusel">
        <h5 class="text_carusel title_carusel">{{$author->name . ' ' . $author->surnames}}</h5>
        @if($author->phrase)
        <p class="text_carusel">"{{$author->phrase}}"</p>
        @else
        <p class="text_carusel">{{$author->description}}</p>
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
@endsection