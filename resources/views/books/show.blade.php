@extends("../layouts.books")

@section("header")
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
        </div>
    </div>
</nav>
@endsection

@section("main")
<article class="article_show">
  <section class="section book_info">
    <h1 class="title text-uppercase display-1">{{$book->title}}</h1>

    <figure class="figure figure_show">
      <img src="{{ asset('images/books/'.$book->front_url) }}" class="figure-img img-fluid rounded img_pic" alt="{{$book->title}}">
      <figcaption class="figure-caption m-2">{{$book->description}}</figcaption>
    </figure>

    <table class="table tb_width">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Gender</th>
          <th scope="col">Release Date</th>
          <th scope="col">Id Author</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">{{$book->id}}</th>
          <td>{{$book->title}}</td>
          <td>{{$book->gender}}</td>
          <td>{{$book->release_date}}</td>
          <td>{{$book->author_id}}</td>
        </tr>
      </tbody>
    </table>
  </section>

  <section class="section author_info">
    <h2 class="subtitle display-2">Author</h2>

    <h3 class="author_name text-uppercase display-5">{{$author->name . " " . $author->surnames}}</h3>

    <figure class="figure figure_show">
      <img src="{{ asset('images/authors/'.$author->photo_url) }}" class="figure-img img-fluid rounded img_pic" alt="{{$author->name . ' ' . $author->surnames}}">
      <figcaption class="figure-caption m-2">{{$author->description}}</figcaption>
    </figure>


    <table class="table tb_width">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Surnames</th>
          <th scope="col">Nationality</th>
          <th scope="col">Gender</th>
          <th scope="col">Date Of Birth</th>
          <th scope="col">Date Of Death</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">{{$author->id}}</th>
          <td>{{$author->name}}</td>
          <td>{{$author->surnames}}</td>
          <td>{{$author->nationality}}</td>
          <td>{{$author->gender}}</td>
          <td>{{$author->date_birth}}</td>
          <td>{{$author->date_death}}</td>
        </tr>
      </tbody>
    </table>
  </section>

</article>
@endsection