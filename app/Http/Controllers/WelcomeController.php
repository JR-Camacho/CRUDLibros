<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $books = Book::take(3)->orderBy('title', 'desc')
        ->get();
        $authors = Author::all();
        return view("welcome", compact('books', 'authors'));
    }
}
