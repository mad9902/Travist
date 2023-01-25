<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TravelList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orderTicket(Request $req, $id)
    {
        $req->validate([
            'ticket_qty' => 'required|numeric|min:1',
            'visit_date' => 'required|date',
            'credit_card_number' => 'required|numeric|digits_between:5,15',
            'payment_method' => 'required|string|in:BCA,Mandiri,Maybank,PayPal'
        ]);

        $destination = TravelList::findOrFail($id);
        $price_after_discount = $destination->discount != null ? $destination->curr_price - (($destination->discount / 100) * $destination->curr_price) : $destination->curr_price;

        Order::create([
            'user_id' => Auth::user()->id,
            'travel_id' => $destination->id,
            'ticket_price' => $price_after_discount,
            'ticket_qty' => $req->ticket_qty,
            'visit_date' => $req->visit_date,
            'credit_card_number' => $req->credit_card_number,
            'payment_method' => $req->payment_method,
            'total_cost' => $destination->discount != null ? $price_after_discount * $req->ticket_qty : $destination->curr_price * $req->ticket_qty
        ]);

        return redirect('/success-order')->with('status', $destination->title);
    }

    public function orderHistory()
    {
        $orderHistory = (Auth::user()->is_admin == 1) ? Order::all() : Order::where('user_id', Auth::user()->id)->get();
        return view('order_history', compact('orderHistory'));
    }
}
