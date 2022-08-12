@extends("../layouts.books")

@section("header")

@endsection

@section("main")
<h1 class="title">Books</h1>
<a class="btn btn-primary btn-lg m-4" href="{{url('/books/create')}}" role="button">NEW</a>
<article class="books_container">
  @foreach($books as $book)
  <div class="card m-4" style="width: 18rem;">
    <img src="images/books/{{$book->front_url}}" class="card-img-top img" alt="{{$book->title}}">
    <div class="card-body">
      <h5 class="card-title">{{$book->title}}</h5>
      <p class="card-text">{{$book->description}}</p>
      <div class="buttons">
        <a href="{{route('books.show', $book->id)}}" class="btn btn-primary">See More</a>
        <a href="{{route('books.edit', $book->id)}}" class="btn btn-primary"><i class="fa-solid fa-marker"></i></a>
        <form action="{{route('books.destroy', $book->id)}}" method="post">
          @csrf
          @method('delete')
          <input type="hidden" name="_method" value="delete">
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-trash"></i></button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</article>
@endsection