<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showAdminDashboard()
    {
        $usersCount = DB::table('users')->count();
        $booksCount = DB::table('books')->count();
        $genresCount = DB::table('genres')->count();
        $activeBooksCount = $this->getActiveBooksCount();
        $genres = Genre::all();
        return view('dashboard', compact('usersCount', 'booksCount', 'genresCount', 'activeBooksCount','genres'));
    }

    private function getActiveBooksCount()
    {
        $books = Book::with('getActiveBorrows')->get();
        $activeBooksCount = 0;

        foreach ($books as $book) {
            if ($book->getActiveBorrows)
                $activeBooksCount += count($book->getActiveBorrows);
        }

        return $activeBooksCount;
    }

    private function getGenresList()
    {

    }
}
