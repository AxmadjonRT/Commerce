<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class ClientsController extends Controller
{


    public function create()
    {
        $clients = new Clients();
        return view('clients', [
            'clients' => $clients
        ]);
    }

    public function storeClient(Request $request)
    {
        $dataC = $request->validate([
            'f_name' => 'bail|required|min:3',
            'l_name' => 'bail|required|min:3',
            'phone' => ['required', 'numeric', new PhoneNumber]
        ]);

        $clients = new Clients;
        $clients->f_name = $dataC['f_name'];
        $clients->l_name = $dataC['l_name'];
        $clients->phone = $dataC['phone'];
        $clients->save();

        return redirect('/');
    }

    public function show()
    {
        $clients = Clients::all();
        return json_encode($clients);
    }

    
}
