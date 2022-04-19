<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Genre;


class GenreController extends Controller
{

    private $styles = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mode = "view";
        $filter = $request->query('filter');
        if (!empty($filter)) {
            $genres = Genre::sortable()->where('name', 'like', '%' . $filter . '%')->paginate(10);
        } else {
            $genres = Genre::sortable()->paginate(10);
        }
        return view('admin.genres.index', compact('genres', 'filter', 'mode'))->with('styles', $this->styles);
    }

    public function showBooksByGenre($id)
    {
        $books = Book::whereHas('genres', function ($query) use ($id) {
            return $query->where('genre_id', '=', $id);
        })->get();

        return view('common.list-by-genre', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genre = new Genre;
        $genre->name =  $request->name;
        $genre->style = $request->style;
        $genre->save();
        return redirect('/genre');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $filter = $request->query('filter');
        if (!empty($filter)) {
            $genres = Genre::sortable()->where('name', 'like', '%' . $filter . '%')->paginate(10);
        } else {
            $genres = Genre::sortable()->paginate(10);
        }
        $genre = Genre::find($id);
        $mode = 'edit';
        return view('admin.genres.index', compact('filter', 'genres', 'genre', 'mode'))->with('styles', $this->styles);
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
        $genre = Genre::findOrFail($id);

        $genre->name = $request->name;
        $genre->style = $request->style;

        $genre->save();
        return  redirect('/genre/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        if ($genre) {
            $genre->delete();
        }
        return redirect('genre');
    }
}
