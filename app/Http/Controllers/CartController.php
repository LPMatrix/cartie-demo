<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('cart');
    }

    public function add(int $id) {
        /* Define some defaults */
        $basePrice = 42.42;

        /* Add the product */
        \Cart::add($id, 'Product ' . $id, 1, $basePrice * $id, 500);

        /* Redirect to prevend re-adding on refreshing */
        return redirect()->route('cart')->withSuccess('Product has been successfully added to the Cart.');
    }

    public function remove($id){
        \Cart::remove($id);
        return redirect()->back()->withSuccess('Product has been successfully added to the Cart.');
    }
}
