<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Http\Requests;

class TransactionController extends Controller
{
    public function insert(Request $r){

        $transaction = new Transaction();
        $transaction->user_id = $r->user_id;
        $transaction->save();

        $cart = session('cart');

        for($i = 0 ; $i < count($cart) ; $i++){
            $product_id = $cart[$i]['game']->id;
            $quantity = $cart[$i]['quantity'];
            $transaction->games()->attach( $product_id, ['quantity' => $quantity]);
        }

        session()->forget('cart');

        return back();
    }

    public function index(Request $request){

        $action = $request->action;


        $transactions = Transaction::all();

//            $transactions = Transaction::where('user_id', Auth::user()->id)->get();


        return view('transaction.index', compact('action', 'transactions'));
    }


    public function delete($id){

        $transaction = Transaction::find($id);
        $transaction->delete();

        return back();
    }

    public function detail($id){

        $transaction = Transaction::find($id);

        return view('transaction.detail', compact('transaction'));
    }

}
