<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $authors = Author::all();
        // return view("authors.index", compact('authors'));

        $text = trim($request->get('text'));
        $authors = DB::table('authors')->select('*')->where('name', 'like', '%' .$text . '%')->orWhere('surnames', 'like', '%' .$text . '%')->orWhere('id', 'like', '%' . $text .'%')->orderBy('name', 'asc')->paginate(5);
        return view("authors.index", compact('authors', 'text'));
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
        $request->validate(['photo_url' => 'image|max:3000', 'name' => 'required', 'phrase' => 'max:390']);
        $entrada = $request->all();
        $perfil = $request->file('photo_url');

        if($perfil){
            $nombre_perfil = time() . '_' . $perfil->getClientOriginalName();
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
        $request->validate(['phrase' => 'max:390']);
        $entrada = $request->all();
        $profile = $request->file('photo_url');

        if($profile){
            $nombre_perfil = time() . '_' . $profile->getClientOriginalName();
            $profile->move('images/authors', $nombre_perfil);
            $entrada['photo_url'] = $nombre_perfil;

            if($author->photo_url != ''){
                unlink('images/authors/'. $author->photo_url);
            }
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
