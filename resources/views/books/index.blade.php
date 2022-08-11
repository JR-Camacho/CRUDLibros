@extends("../layouts.books")

@section("header")

@endsection

@section("main")
<h1 class="title">Books</h1>
<article class="books_container">
  @foreach($books as $book)
  <div class="card" style="width: 18rem;">
    <img src="images/books/{{$book->front_url}}" class="card-img-top img" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$book->title}}</h5>
      <p class="card-text">{{$book->description}}</p>
      <a href="#" class="btn btn-primary">See More</a>
    </div>
  </div>
  @endforeach
</article>
@endsection