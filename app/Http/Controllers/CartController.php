<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class CartController extends Controller
{
    public function store()
	{
		dd('a');
		
		$id    		= Input::get('id');

		$qty		= Input::get('qty');
		$product 	= Inventory::find($id);

		$store = Cart::associate('Inventory')->add(array(
						'id' 	=> $product->id,
						'name'	=> $product->name,
						'qty'   => $qty,
						'price'	=> $product->price
				  ));
		
		return Redirect::to('inventory_cart');
		

		

	}
}
