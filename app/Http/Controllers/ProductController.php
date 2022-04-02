<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Clients;
use Illuminate\Http\Request;

class ProductController extends Controller
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
}
