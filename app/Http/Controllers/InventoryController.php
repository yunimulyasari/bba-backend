<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inventory;
use Darryldecode\Cart\CartCondition;
use \stdClass;
use Response;
use Session;

class InventoryController extends Controller
{
    public function index()
    {
        $data['products'] = Inventory::get();

        return view('front.inventory', $data);
    }

    public function detail($id)
    {
		$data['product'] 	= Inventory::find($id);

		return view('front.inventory_detail', $data);
    }

    
}