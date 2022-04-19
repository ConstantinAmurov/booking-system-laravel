<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $genre = $request->query('genre');

        $books = Book::sortable();
        $allGenres = Genre::all();


        if (!empty($filter)) {
            $books = $books->where('title', 'like', '%' . $filter . '%')->orWhere('author', 'like', '%' . $filter . '%');
        }

        $books = $books->paginate(10);

        return view('admin.books.index', compact('books', 'filter'))->with('genres', $allGenres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $genres = Genre::all();
        return view('admin.books.add-page', compact('genres'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $book = new Book;
        $lastValue = Book::latest()->first();

        if ($lastValue) {
            $book->id = $lastValue->id + 1;
        } else $book->id = 1;

        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->released_at = $request->released_at;
        $book->pages = $request->pages;
        $book->isbn = $request->isbn;
        $book->language_code = $request->language_code;
        $book->in_stock  = $request->in_stock;


        $genres = Genre::find($request->genres);
        $book->genres()->sync($genres);

        $book->save();
        return  redirect('/book/' . $book->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBookPage($id)
    {
        $user = Auth::user();
        $book = Book::with('genres')->findOrFail($id);
        $userCanBorrow = !Borrow::where([['reader_id', '=', $user->id], ['book_id', '=', $book->id], ['status', '!=', 'RETURNED']])->exists();
        return view('admin.books.book-page', compact('book', 'userCanBorrow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //  $book = new Book;
        $book = Book::with('genres')->findOrFail($id);
        $book->genres = $book->genres->toArray();
        $genres = Genre::all();

        return view('admin.books.edit-page', compact('book', 'genres'));
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

        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->released_at = $request->released_at;
        $book->pages = $request->pages;
        $book->isbn = $request->isbn;
        $book->language_code = $request->language_code;
        $book->in_stock  = $request->in_stock;

        $genres = Genre::find($request->genres);
        $book->genres()->sync($genres);

        $book->save();
        return  redirect('/book/' . $id);
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
        if ($book) {
            $book->delete();
        }
        return redirect('dashboard');
    }


    public function borrow($id)
    {
        $user = Auth::user();
        $book = Book::find($id);

        $borrow = new Borrow;

        $borrow->reader_id = $user->id;
        $borrow->book_id = $book->id;

        $borrow->save();

        $book->in_stock--;
        $book->save();

        return redirect('dashboard');
    }
}
