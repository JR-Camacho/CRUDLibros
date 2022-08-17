@extends("../layouts.books")

@section("header")

@endsection

@section("main")
<article class="article_show">
  <section class="section author_info">
    <h1 class="text-uppercase display-1 title title_welcome">{{$author->name . " " . $author->surnames}}</h1>

    <figure class="figure figure_show">
      @if($author->photo_url)
      <img src="{{ asset('images/authors/'.$author->photo_url) }}" class="figure-img img-fluid rounded img_pic" alt="{{$author->name . ' ' . $author->surnames}}">
      @endif
      <figcaption class="figure-caption m-2">{{$author->description}}</figcaption>
    </figure>


    @if($author->phrase)
    <h3 class="text-center display-4">Phrase</h3>
    <p class="fw-light info phrase">"{{$author->phrase}}"</p>
    @endif

    <table class="table tb_width">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Surnames</th>
          <th scope="col">Nationality</th>
          <th scope="col">Gender</th>
          <th scope="col">Birth</th>
          <th scope="col">Death</th>
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

  @if($books)
    <h2 class="subtitle display-2">Books</h2>
    <section class="books_container">
      @foreach($books as $book)
      <div class="card card_book">
        <img src="{{ asset('images/books/'.$book->front_url) }}" class="card-img-top img" alt="{{$book->title}}">
        <div class="card-body">
          <h5 class="card-title">{{$book->title}}</h5>
          <p class="card-text">{{$book->description}}</p>
          <div class="buttons">
            <a href="{{route('books.show', $book->id)}}" class="btn btn-info">See More</a>
          </div>
        </div>
      </div>
      @endforeach
    </section>
  @endif
</article>
@endsection