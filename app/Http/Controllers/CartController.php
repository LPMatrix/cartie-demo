<?php

namespace App\Http\Controllers;
use Lpmatrix\Cartie;

use Illuminate\Http\Request;

class CartController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');

        $cart = new \Cartie([
			// Maximum item can added to cart, 0 = Unlimited
			'cartMaxItem' => 0,

			// Maximum quantity of a item can be added to cart, 0 = Unlimited
			'itemMaxQuantity' => 5,

			// Do not use cookie, cart items will gone after browser closed
			'useCookie' => false,
		]);
    }

    public function index()
    {
        return view('cart');
    }

    public function add(int $id) {
        /* Define some defaults */
        $basePrice = 42.42;

        /* Add the product */
        \Cartie::add($id, 'Product ' . $id, 1, $basePrice * $id, 500);

        /* Redirect to prevend re-adding on refreshing */
        return redirect()->route('cart')->withSuccess('Product has been successfully added to the Cart.');
    }

    public function remove($id){
        \Cart::remove($id);
        return redirect()->back()->withSuccess('Product has been successfully removed from the Cart.');
    }

    public function clearCart(){
        $cart->clear();
        return redirect()->back()->withSuccess('Clart is now empty');
    }
}
