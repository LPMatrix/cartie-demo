<?php

namespace App\Http\Controllers;
use Lpmatrix\Cartie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        /* Add the product */
        $product = DB::table('products')->find($id);
        \Cartie::add(['id'=>$id, 'name'=>$product->name, 'price'=>$product->price, 'quantity'=>1]);

        /* Redirect to prevend re-adding on refreshing */
        return redirect()->route('cart')->withSuccess('Product has been successfully added to the Cart.');
    }

    public function remove($id){
        \Cartie::remove($id);
        return redirect()->back()->withSuccess('Product has been successfully removed from the Cart.');
    }

}
