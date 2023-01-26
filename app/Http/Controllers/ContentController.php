<?php

namespace App\Http\Controllers;

use App\Models\TravelList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function profile(Request $req)
    {
        return view('profile');
    }

    public function editProfile(Request $req)
    {
        $req->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|string|min:3|unique:users',
            'phone_number' => 'required|numeric|digits_between:5,15',
            'address' => 'required|string'
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $req->name,
            'email' => $req->email,
            'phone_number' => $req->phone_number,
            'address' => $req->address,
        ]);

        return redirect('/my-profile')->with('status', 'Profil berhasil diubah');
    }
}
