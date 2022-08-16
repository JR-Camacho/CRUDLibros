@extends("../layouts.books")

@section("header")

@endsection

@section("main")
<article class="article_show">
  <section class="section author_info">
    <h1 class="title text-uppercase">{{$author->name . " " . $author->surnames}}</h1>

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

  <section class="books_container">
    @foreach($books as $book)
    <div class="card card_book">
      <img src="{{ asset('images/books/'.$book->front_url) }}" class="card-img-top img" alt="{{$book->title}}">
      <div class="card-body">
        <h5 class="card-title">{{$book->title}}</h5>
        <p class="card-text">{{$book->description}}</p>
        <div class="buttons">
          <a href="{{route('books.show', $book->id)}}" class="btn btn-primary">See More</a>
        </div>
      </div>
    </div>
    @endforeach
  </section>
</article>
@endsection