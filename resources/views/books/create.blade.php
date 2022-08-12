@extends("../layouts.books")

@section("header")

@endsection

@section("main")
<div class="container_form">
    <form class="form" action="{{url('/books')}}" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Ex: Don Quijote de la Mancha">
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="gender">
                <option selected value="">Select a Gender</option>
                <option value="Novela">Novela</option>
                <option value="Cuento">Cuento</option>
                <option value="Aventura">Aventura</option>
                <option value="Historia">Historia</option>
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="author_id">
                <option selected value="">Select an Author</option>
                @foreach($authors as $author)
                <option value="{{$author->id}}">{{$author->name . " " . $author->surnames}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="front_url" class="form-label">Front Page</label>
            <input class="form-control" type="file" id="front_url" name="front_url" accept=".jpeg, .png, .jpg">
            @error('front_url')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input class="form-control" type="date" id="release_date" name="release_date">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control description" id="description" name="description" rows="3" placeholder="Wirite a short description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        {{csrf_field()}}
    </form>
</div>
@endsection