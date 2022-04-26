<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Borrow;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->is_librarian) return $this->showAdminDashboard();
        else return $this->showUserDashboard($request);
    }

    public function showAdminDashboard()
    {
        $usersCount = DB::table('users')->count();
        $booksCount = DB::table('books')->count();
        $genresCount = DB::table('genres')->count();
        $activeBooksCount = $this->getActiveBooksCount();
        $genres = Genre::all();
        return view('admin.dashboard', compact('usersCount', 'booksCount', 'genresCount', 'activeBooksCount', 'genres'));
    }

    public function showUserDashboard(Request $request)
    {

        $status = $request->query('status');
        $user = User::all()->find(Auth::id());
        $borrows = Borrow::sortable();
        $borrows = $borrows->with('getBookRelation')->with('getLibrarianRelation')->where('reader_id', '=', $user->id);


        if (!empty($status)) {
            switch ($status) {
                case 'pending':
                    $borrows = $borrows->where('status', '=', 'PENDING');
                    break;
                case 'in_time':
                    $borrows = $borrows->where('status', '=', 'ACCEPTED')->whereDate('deadline', '>', Carbon::now());
                    break;
                case 'late_rentals':
                    $borrows = $borrows->where('status', '=', 'ACCEPTED')->whereDate('deadline', '<', Carbon::now());
                    break;
                case 'rejected':
                    $borrows = $borrows->where('status', '=', 'REJECTED');
                    break;
                case 'returned':
                    $borrows = $borrows->where('status', '=', 'RETURNED');
                    break;
            }
        }

        $borrows = $borrows->paginate(10);

        return view('user.dashboard', compact('borrows'));
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
}
