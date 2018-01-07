<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Game;

class CartController extends Controller
{
    public function index(){

        $cart = session('cart');

        return view('cartview', compact('cart'));
    }

    private function inCart($cart, $id){
        for($i = 0 ; $i < count($cart) ; $i++){
            if($cart[$i]['game']->id == $id)
                return $i;
        }

        return false;
    }

    public function insert(Request $request){

        $this->validate($request, [
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session('cart');

        $index = $this->inCart($cart, $request->game_id);
        if($index !== false){
            $cart[$index]['quantity'] += $request->quantity;

            $request->session()->put('cart', $cart);
        }else{
            $product = [
                'game' => Game::find($request->game_id),
                'quantity' => $request->quantity,
            ];

            $request->session()->push('cart', $product);
        }

        return back();
    }

    public function delete($id, Request $request){
        $cart = session('cart');

        $index = $this->inCart($cart, $id);

        array_splice($cart, $index, 1);

        $request->session()->put('cart', $cart);

        return back();
    }
}
