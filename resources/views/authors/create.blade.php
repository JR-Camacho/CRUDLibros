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
<h1 class="title display-1">New Author</h1>
<div class="container_form">
    <form class="form" action="{{url('/authors')}}" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ex: José Rafael" autofocus>
        </div>
        <div class="mb-3">
            <label for="surnames" class="form-label">Surnames</label>
            <input type="text" class="form-control" id="surnames" name="surnames" placeholder="Ex: Camacho Custodio">
        </div>
        <div class="mb-3">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Ex: Dominican Republic">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
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
        </div>
        <div class="mb-3">
            <label for="date_birth" class="form-label">Date of Birth</label>
            <input class="form-control" type="date" id="date_birth" name="date_birth">
        </div>
        <div class="mb-3">
            <label for="date_death" class="form-label">Date of Death</label>
            <input class="form-control" type="date" id="date_death" name="date_death">
        </div>
        <div class="mb-3">
            <label for="photo_url" class="form-label">Porfile Photo</label>
            <input class="form-control" type="file" id="photo_url" name="photo_url" accept=".jpeg, .png, .jpg">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control description" id="description" name="description" rows="3" placeholder="Wirite a short description"></textarea>
        </div>
        <div class="mb-3">
            <label for="phrase" class="form-label">Phrase</label>
            <textarea class="form-control description" id="phrase" name="phrase" rows="3" placeholder="Wirite a phrase"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        {{csrf_field()}}
    </form>
</div>
@endsection