<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    
    
    public function index($id)
    {
        $book = Book::find($id);
        return $book;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $book = new Book;
        $book->title = 'Atomic Habits';
        $book->authors = "John Writer";
        $book-> description = "Description example";
        $book -> released_at = Carbon::today();
        $book-> pages = 231;
        $book -> isbn ='1';
        $genre = Genre::find([1,2]);
        $book-> genres()-> attach($genre);
        $book-> in_stock  = 30;
        $book-> save();
        return 'Success';
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBookPage($id)
    {
        $book = Book::find($id);

        return view('admin.books.book-page',compact('book'));
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
        $book = Book::find($id);
        $book->title = 'Atomic Habits';
        $book->authors = "John Writer";
        $book-> description = "Description example";
        $book -> released_at = Carbon::today();
        $book-> pages = 231;
        $book -> isbn ='1';
        $genre = Genre::find([1,2]);
        $book-> genres()-> attach($genre);
        $book-> in_stock  = 30;
        $book-> save();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Book::destroy($id);
    }

    public function showBooksTablePage(Request $request) {
        $filter = $request->query('filter');
    
        if (!empty($filter)) {
            $books = Book::sortable()
                ->where('title', 'like', '%'.$filter.'%')->orWhere('author', 'like', '%'.$filter.'%')
                ->paginate(10);
        } else {
            $books = Book::sortable()
                ->paginate(10);
        }
    
        
        return view('admin.books.index',compact('books','filter'));
    }

}
