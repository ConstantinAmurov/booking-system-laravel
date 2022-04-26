<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $status  = $request->query('status');

        $borrows = Borrow::sortable();
        $borrows = $borrows->with('getBookRelation')->with('getLibrarianRelation');


        if (!empty($filter)) {
            $borrows = $borrows->where('reader_id', 'like', '%' . $filter . '%');
        }

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
        return view('admin.rentals.index', compact('borrows', 'filter'));
    }


    public function view($id)
    {
        $borrow = Borrow::with('getBookRelation')->find($id);
        $book = $borrow->getBookRelation;
        return view('user.rentals.rental-page', compact('book', 'borrow'));
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

    public function accept(Request $request, $id)
    {
        $deadline = $request->deadline;
        $user = Auth::user();
        $borrow = Borrow::find($id);

        $borrow->request_managed_by = $user->id;
        $borrow->deadline = $deadline;
        $borrow->status = "ACCEPTED";
        $borrow->save();

        return redirect('/rental');
    }

    public function reject($id)
    {
        $user = Auth::user();
        $borrow = Borrow::find($id);
        $borrow->request_managed_by = $user->id;
        $borrow->status = "REJECTED";
        $borrow->save();

        return redirect('/rental');
    }

    public function return($id)
    {
        $user = Auth::user();
        $borrow = Borrow::find($id);
        $borrow->returned_at = Carbon::now()->toDateString();
        $borrow->return_managed_by = $user->id;
        $borrow->status = "RETURNED";
        $borrow->save();

        return redirect('/rental');
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
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
    }
}
