<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $books = Book::all();
        // return view("books.index", compact('books'));

        $text = trim($request->get('text'));
        $books = DB::table('books')->select('*')->where('title', 'like', '%' .$text . '%')->orWhere('id', 'like', '%' . $text .'%')->orderBy('title', 'asc')->paginate(5);
        return view("books.index", compact('books', 'text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view("books.create", compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['front_url' => 'image|max:3000', 'title' => 'required']);
        $entrada = $request->all();
        $portada = $request->file('front_url');

        if($portada){
            $nombre_portada = time() . '_' . $portada->getClientOriginalName();
            $portada->move('images/books', $nombre_portada);
            $entrada['front_url'] = $nombre_portada;
        }

        Book::create($entrada);
        return redirect("/books");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $author = Book::findOrFail($id)->author;
        // $author = Author::findOrFail($book->author_id);

        return view("books.show", compact('book', 'author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autores = Author::all();
        $book = Book::findOrFail($id);
        $author = Book::findOrFail($id)->author;

        return view("books.edit", compact('book', 'autores', 'author'));
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
        $book = Book::findOrFail($id);
        $request->validate(['front_url' => 'image|max:3000', 'title' => 'required']);
        $entrada = $request->all();
        $portada = $request->file('front_url');

        if($portada){
            $nombre_portada = time() . '_' . $portada->getClientOriginalName();
            $portada->move('images/books', $nombre_portada);
            $entrada['front_url'] = $nombre_portada;

            if($book->front_url != ''){
                unlink('images/books/'. $book->front_url);
            }
        }

        $book->update($entrada);
         return redirect("/books");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if($book->front_url != ''){
            unlink('images/books/'. $book->front_url);
        }
        $book->delete();

        return redirect("/books");
    }
}
