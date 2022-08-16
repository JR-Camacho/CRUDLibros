@extends("../layouts.books")

@section("header")

@endsection

@section("main")
<h1 class="title">Authors</h1>
<a class="btn btn-primary btn-lg m-4" href="{{url('/authors/create')}}" role="button">NEW</a>
<article class="books_container">
  @foreach($authors as $author)
  <div class="card card_author">
    <img src="images/authors/{{$author->photo_url}}" class="card-img-top img" alt="{{$author->title}}">
    <div class="card-body">
      <h5 class="card-title">{{$author->name . " " . $author->surnames}}</h5>
      <p class="card-text">{{$author->description}}</p>
      <div class="buttons">
        <a href="{{route('authors.show', $author->id)}}" class="btn btn-primary">See More</a>
        <a href="{{route('authors.edit', $author->id)}}" class="btn btn-primary"><i class="fa-solid fa-marker"></i></a>
        <form action="{{route('authors.destroy', $author->id)}}" method="post">
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