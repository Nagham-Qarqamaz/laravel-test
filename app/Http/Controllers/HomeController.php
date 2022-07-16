<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // function to handle homepage
    function index(Request $request) 
    {
        $genre = $request->input('genre');
        $q = $request->input('q');

        $books = Book::query();

        if($q) {
            $books = $books->whereHas('author', function ($query) use ($q) {
                $query->select()->where('name' , 'LIKE', '%'.$q.'%');
            })
            ->with('author')
            ->orWhere('description', 'LIKE', '%'.$q.'%')
            ->orWhere('title', 'LIKE', '%'.$q.'%');
        }

        if($genre) {
            $books = $books->orWhereHas('genres', function ($query) use ($genre) {
                $query->select()->where('genres.id' , '=', $genre);
            });            
        }

        $books = $books->orderBy('books.created_at','DESC')->paginate(9);
        return view('home',[
            'books' => $books,
            'genres' => Genre::all()
        ]);
    }

    // function to response ajax call in homepage
    function review(Request $request) 
    {
        $book = Book::find($request->input('id'));
        $book = $book->review($request->input('review'));
        
        return response()->json([
            'likes' => $book->likes,
            'verdict' => true
        ]);
    }
}
