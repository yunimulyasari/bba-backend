<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inventory;
use Darryldecode\Cart\CartCondition;
use \stdClass;
use Response;
use Session;

class CartController extends Controller
{
    public function store(Request $request)
	{
		$id    		= $request->input('id');

		$qty		= $request->input('qty');
		$inventory 	= Inventory::find($id);

		// add the product to cart
		\Cart::add(array(
		    'id' => $id,
		    'name' => $inventory->name,
		    'price' => $inventory->price,
		    'quantity' => $qty,
		    'attributes' => array(),
		    'conditions' => [],
		    'associatedModel' => $inventory
		));
				
		return redirect('inventory-cart');
	}

	public function show()
	{
		$cartValue = \Cart::getContent();
		
		//variable global
		$conditionId1  = 2;
		$conditionName1 = 'Macbook_Pro';

		$conditionId2  = 1;
		$conditionName2 = 'Google_Home';

		$conditionId3  = 3;
		$conditionName3 = 'Alexa_Speaker';

		$priceTotal = 0;
		$priceCond = 0;

		foreach ($cartValue as $key => $value) {
			// condition sale of macbook pro and raspberry pi b
			if ($value->associatedModel['code'] == '43N23P' AND $value->associatedModel['code'] == '234234' AND $value->quantity == 1) {
				$data['discMac'] = $value->price;
				$data['discRasp'] = '0';

				$itemCondition1 = new CartCondition(array(
				    'name' => 'Macbook_Pro',
				    'type' => 'sale',
				    'target' => 'subtotal',
				    'value' => $data['discMac'],
				));

				// remove specific cart condition then add item
				\Cart::removeItemCondition($conditionId1, $conditionName1);
				\Cart::addItemCondition($conditionId1, $itemCondition1);
			} else {
				$data['discMac'] = '0';
			}

			// condition discount google home for the price of 2
			if ($value->associatedModel['code'] == '120P90' AND $value->quantity == 3) {
				$data['discGoogleHome'] = $value->price * 2;

				$itemCondition2 = new CartCondition(array(
				    'name' => 'Google_Home',
				    'type' => 'promo',
				    'target' => 'subtotal',
				    'value' => $data['discGoogleHome'],
				));

				// remove specific cart condition then add item
				\Cart::removeItemCondition($conditionId2, $conditionName2);
				\Cart::addItemCondition($conditionId2, $itemCondition2);
			} else {
				$data['discGoogleHome'] = '0';
			}

			// condition 10% discount of alexa speaker
			if ($value->associatedModel['code'] == 'A304SD' AND $value->quantity == 3) {
				$alexaPrice = 3 * $value->price;
				$data['discAlexa'] = $alexaPrice - (10 * $alexaPrice / 100);

				$itemCondition3 = new CartCondition(array(
				    'name' => 'Alexa_Speaker',
				    'type' => 'discount',
				    'target' => 'subtotal',
				    'value' => $data['discAlexa'],
				));

				// remove specific cart condition then add item
				\Cart::removeItemCondition($conditionId3, $conditionName3);
				\Cart::addItemCondition($conditionId3, $itemCondition3);
			} else {
				$data['discAlexa'] = '0';
			}
		}

		//get the total price and the price single item with the conditions
		foreach ($cartValue as $key => $cart) {
			$total = \Cart::getTotal();
			//by conditions in cart
			if (!empty($cart['conditions'])) {
				foreach ($cart['conditions'] as $key => $cond) {
					$priceTotal = $cond->getValue();
				}

			//by raspberry pi b
			} else if (\Cart::get(2) !== null) {
				if (empty(\Cart::get(4)->id) AND $cart->associatedModel['code'] == '234234' AND $cart->quantity == 1 AND !empty(\Cart::get(2)->quantity == 1)) {
					$priceCond = \Cart::get(2)->price;
				}
			} else {
				//except without conditions show price subtotal by item
				$priceCond = $cart->getPriceWithConditions() * $cart->quantity;
			}
		}

		if ($priceTotal == 0) {
			$data['total'] = \Cart::getTotal();
		} else {
			$data['total'] = $priceCond + $priceTotal;
		}

		$data['carts'] = \Cart::getContent();
		
		return view('front.inventory_cart', $data);
	}

	public function checkout(Request $request)
	{
		$data['carts']			= \Cart::getContent();
		$data['qty']  			= $request->input('quantities');
		$data['total']  		= $request->input('grandTotal');
		$data['name']  			= $request->input('fullName');
		$data['phone']  		= $request->input('phone');
		$data['address']  		= $request->input('address');
		$rowid 					= $request->input('rowid');
		$jumlah 				= count($rowid);

		$dataInventory = Inventory::get()->toArray();

		for($i=0; $i<$jumlah; $i++)
		{
			//update cart quantity 
			 $insert = [
                'id' => $rowid[$i],
                'qty' => \Cart::update($rowid[$i], array('qty' => $data['qty'][$i]))

            ];

			Inventory::where('id', $rowid[$i])->update($insert);

		}
		//\Cart::remove();

		return view('front.inventory_shipping', $data);
	}

	public function deleteCart(Request $request)
	{
		/*$rowId = $request->input('id');
		\Cart::remove($rowId);*/

		$result = new stdClass;
		$id = $request->input('id');

		if($id != null)
		{
			\Cart::remove($id);
			$result->status = true;
			$result->msg = "Product has been removed.";
			//$result->totalcart = Cart::total();
		} else {
			$result->status = false;
			$result->msg = "Id not found.";
		}

		//return Response::json(array('result' => $result),200);
		return redirect('inventory-cart');
	}


}


