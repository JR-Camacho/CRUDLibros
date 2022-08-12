<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view("authors.index", compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada = $request->all();
        $perfil = $request->file('photo_url');

        if($perfil){
            $nombre_perfil = $perfil->getClientOriginalName();
            $perfil->move('images/authors', $nombre_perfil);
            $entrada['photo_url'] = $nombre_perfil;
        }

        Author::create($entrada);
        return redirect('/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::findOrFail($id);
        $books = Author::findOrFail($id)->book;
        return view("authors.show", compact('books', 'author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);

        return view("authors.edit", compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $entrada = $request->all();
        $profile = $request->file('photo_url');

        if($profile){
            $photo_name = $profile->getClientOriginalName();
            $profile->move('images/authors', $photo_name);
            $entrada['photo_url'] = $photo_name;
        }

        if($author->photo_url != ''){
            unlink('images/authors/'. $author->photo_url);
        }

        $author->update($entrada);
         return redirect("/authors");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        if($author->photo_url != ''){
            unlink('images/authors/'. $author->photo_url);
        }
        $author->delete();

        return redirect("/authors");
    }
}
