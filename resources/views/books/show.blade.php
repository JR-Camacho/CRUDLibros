@extends("../layouts.books")

@section("header")

@endsection

@section("main")
<article>
  <section>
    <h1 class="title">{{$book->title}}</h1>

    <div class="clearfix">
      <img src="images/books/{{$book->front_url}}" class="col-md-6 float-md-end mb-3 ms-md-3" alt="{{$book->title}}">
      <p>{{$book->description}}</p>
    </div>

    <table class="table">
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

  <section>
    <h2>Author</h2>

    <h3>{{$author->name}}</h3>
    <div class="clearfix">
      <img src="images/authors/{{$author->photo_url}}" class="col-md-6 float-md-end mb-3 ms-md-3" alt="{{$author->title}}">
      <p>{{$author->description}}</p>
    </div>


    <table class="table">
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