<?php

namespace App\Http\Controllers;

use App\Models\TravelList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TravelListController extends Controller
{
    public function index()
    {
        $destinations = TravelList::all();
        return view('admin.all_destination', compact('destinations'));
    }

    public function show($id)
    {
        $destination = TravelList::findOrFail($id);
        return view('destination_detail', compact('destination'));
    }

    public function create()
    {
        return view('admin.create_destination');
    }

    public function store(Request $req)
    {
        $req->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'price' => 'required|numeric|min:3',
        ]);

        $files = $req->file('image');
        $fullFileName = $files->getClientOriginalName();
        $image = pathinfo($fullFileName)['filename'] . '_' . rand() . "." . $files->getClientOriginalExtension();
        $files->storeAs('public/images', $image);

        TravelList::create([
            'image' => $image,
            'title' => $req->title,
            'description' => $req->description,
            'curr_price' => $req->price,
            'discount' => $req->discount,
            'price_after_discount' => $req->discount != null ? $req->price - (($req->discount / 100) * $req->price) : null,
        ]);

        return redirect('/travel-list')->with('status', 'Destinasi berhasil dibuat');
    }

    public function edit($id)
    {
        $destination = TravelList::findOrFail($id);
        return view('admin.edit_destination', compact('destination'));
    }

    public function update(Request $req, $id)
    {
        if ($req->file('image') == null) {
            $req->validate([
                'title' => 'required|string|min:3',
                'description' => 'required|string|min:3',
                'price' => 'required|numeric|min:3',
            ]);
            $destination = TravelList::findOrFail($id);
            $destination->update([
                'title' => $req->title,
                'description' => $req->description,
                'curr_price' => $req->price,
                'discount' => $req->discount,
                'price_after_discount' => $req->discount != null ? $req->price - (($req->discount / 100) * $req->price) : '',
            ]);
        } else {
            $req->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required|string|min:3',
                'description' => 'required|string|min:3',
                'price' => 'required|numeric|min:3',
            ]);

            $files = $req->file('image');
            $fullFileName = $files->getClientOriginalName();
            $image = pathinfo($fullFileName)['filename'] . '_' . rand() . "." . $files->getClientOriginalExtension();
            $files->storeAs('public/images', $image);

            $destination = TravelList::findOrFail($id);
            if (Storage::exists('public/images/' . $destination->image)) {
                Storage::delete('public/images/' . $destination->image);
            }

            $destination->update([
                'image' => $image,
                'title' => $req->title,
                'description' => $req->description,
                'curr_price' => $req->price,
                'discount' => $req->discount,
                'price_after_discount' => $req->discount != null ? $req->price - (($req->discount / 100) * $req->price) : null,
            ]);
        }

        return redirect('/travel-list')->with('status', 'Destinasi berhasil diubah');
    }

    public function destroy($id)
    {
        $destination = TravelList::findOrFail($id);
        if (Storage::exists('public/images/' . $destination->image)) {
            Storage::delete('public/images/' . $destination->image);
        }
        $destination->delete();

        return redirect('/travel-list')->with('status', 'Destinasi berhasil dihapus');
    }
}
