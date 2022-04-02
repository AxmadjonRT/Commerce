<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Rules\PhoneNumber;
use App\Models\Clients;
use App\Models\OrderProducts;
use App\Models\Orders;

class OrderController extends Controller
{

    public function index()
    {
        $products = Products::all();
        $clients = Clients::all();
        return view('welcome', [
            'products' => $products,
            'clients' => $clients
        ]);
    }
    public function store(Request $request, Clients $id)
    {
        $data = $request->validate([
            'client_id' => 'required',
            'products_ids' => 'required'
        ]);

        $client = Clients::find($data['client_id']);
        
        $order = new Orders();
        $order->name = $client->f_name;
        $order->phone = $client->phone;
        $order->client_id = $client->id;
        $order->save();

        foreach ($data['products_ids'] as $pr) {
            $product = Products::find($pr);
            $orderProduct = new OrderProducts();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $pr;
            $orderProduct->products_name = $product->products_name;
            $orderProduct->products_price = $product->products_price;
            $orderProduct->save();
        }

        return redirect('/');
    }
}
