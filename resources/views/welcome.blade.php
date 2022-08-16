@extends("./layouts.books")

@section("header")

@endsection

@section("main")

<div class="carrusel_container">
    <h2 class="title">Books</h2>
    <div id="carouselExampleCaptions" class="carousel slide carrusel" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner carusel">
            @foreach($books as $book)
            <div class="carousel-item active">
                <img src="images/books/{{$book->front_url}}" class="d-block img_carusel" alt="{{$book->title}}">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{$book->title}}</h5>
                    <p>{{$book->description}}</p>
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

<div class="carrusel_container">
<h2 class="title">Authors</h2>

<div id="carouselExampleDark" class="carousel carousel-dark slide carrusel" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner carusel">
        @foreach($authors as $author)
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="images/authors/{{$author->photo_url}}" class="d-block img_carusel" alt="{{$author->title}}">
            <div class="carousel-caption d-none d-md-block">
                <h5>{{$author->name}}</h5>
                <p>{{$author->description}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

</div>
@endsection