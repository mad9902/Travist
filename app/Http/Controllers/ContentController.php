<?php

namespace App\Http\Controllers;

use App\Models\TravelList;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function home()
    {
        $destinations = TravelList::all();
        return view('home', compact('destinations'));
    }

    public function success_order()
    {
        return view('success_order');
    }

    public function search(Request $req)
    {
        $req->validate(['search' => 'required']);
        $searchResults = TravelList::where('title', 'like', '%' . $req->search . '%')->get();
        return view('search_results', [
            'search' => $req->search,
            'searchResults' => $searchResults,
        ]);
    }

    public function resetPassword()
    {
        return view('auth.passwords.reset');
    }
}
