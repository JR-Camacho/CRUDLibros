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
<h1 class="title display-1">Edit a Book</h1>
<div class="container_form">
    <form class="form" action="{{url('/books/'.$book->id)}}" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Ex: Don Quijote de la Mancha" value="{{$book->title}}">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" aria-label="Default select example" id="gender" name="gender">
                <option selected value="{{$book->gender}}">{{$book->gender}}</option>
                <option value="Novela">Novela</option>
                <option value="Cuento">Cuento</option>
                <option value="Aventura">Aventura</option>
                <option value="Historia">Historia</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <select class="form-select" aria-label="Default select example" id="author" name="author_id">
                @if($author)
                <option selected value="{{$author->id}}">{{$author->name . " " . $author->surnames}}</option>
                @else
                <option selected value="">Select an Author</option>
                @foreach($autores as $autor)
                <option value="{{$autor->id}}">{{$autor->name . " " . $autor->surnames}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label for="front_url" class="form-label">Front Page</label>
            <input class="form-control" type="file" id="front_url" name="front_url" accept=".jpeg, .png, .jpg" value="images/books/{{$book->front_url}}">
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input class="form-control" type="date" id="release_date" name="release_date" value="{{$book->release_date}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control description" id="description" name="description" rows="3" placeholder="Wirite a short description">{{$book->description}}</textarea>
        </div>
        <input type="hidden" name="_method" value="put">
        <button type="submit" class="btn btn-primary">Update</button>
        {{csrf_field()}}
    </form>
</div>

@endsection