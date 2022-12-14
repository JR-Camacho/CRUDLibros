@extends("../layouts.books")

@section("header")

@endsection

@section("main")
<h1 class="title display-1">Edit a Book</h1>
<div class="container_form">
    <form class="form" action="{{url('/books/'.$book->id)}}" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Ex: Don Quijote de la Mancha" value="{{$book->title}}">
            @error('title')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" aria-label="Default select example" id="gender" name="gender">
                <option selected value="{{$book->gender}}">{{$book->gender}}</option>
                <option value="Novela">Novela</option>
                <option value="Cuento">Cuento</option>
                <option value="Aventura">Aventura</option>
                <option value="Historia">Historia</option>
                <option value="Poema">Poema</option>
                <option value="Comedia">Comedia</option>
                <option value="Ensayo">Ensayo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <select class="form-select" aria-label="Default select example" id="author" name="author_id">
                @if($author)
                <option selected value="{{$author->id}}">{{$author->name . " " . $author->surnames}}</option>
                @foreach($autores as $autor)
                <option value="{{$autor->id}}">{{$autor->name . " " . $autor->surnames}}</option>
                @endforeach
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
            @error('front_url')
                <p class="text-danger">{{$message}}</p>
            @enderror
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