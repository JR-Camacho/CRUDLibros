@extends("../layouts.books")

@section("header")

@endsection

@section("main")
<h1 class="title display-1">Edit an Author</h1>
<div class="container_form">
    <form class="form" action="{{url('/authors/'.$author->id)}}" method="post" enctype="multipart/form-data">
    <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ex: José Rafael" value="{{$author->name}}">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surnames" class="form-label">Surnames</label>
            <input type="text" class="form-control" id="surnames" name="surnames" placeholder="Ex: Camacho Custodio" value="{{$author->surnames}}">
        </div>
        <div class="mb-3">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Ex: Dominican Republic" value="{{$author->nationality}}">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            @if($author->gender == 'Masculino')
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="Masculino" checked>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="Femenino">
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            @else
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male" value="Masculino">
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="Femenino" checked>
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="date_birth" class="form-label">Date of Birth</label>
            <input class="form-control" type="date" id="date_birth" name="date_birth" value="{{$author->date_birth}}">
        </div>
        <div class="mb-3">
            <label for="date_death" class="form-label">Date of Death</label>
            <input class="form-control" type="date" id="date_death" name="date_death" value="{{$author->date_death}}">
        </div>
        <div class="mb-3">
            <label for="photo_url" class="form-label">Porfile Photo</label>
            <input class="form-control" type="file" id="photo_url" name="photo_url" accept=".jpeg, .png, .jpg" value="images/authors/{{$author->photo_url}}">
            @error('photo_url')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control description" id="description" name="description" rows="3" placeholder="Wirite a short description">{{$author->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="phrase" class="form-label">Phrase</label>
            <textarea class="form-control description" id="phrase" name="phrase" rows="3" placeholder="Wirite a phrase">{{$author->phrase}}</textarea>
            @error('phrase')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <input type="hidden" name="_method" value="put">
        <button type="submit" class="btn btn-primary">Update</button>
        {{csrf_field()}}
    </form>
</div>

@endsection