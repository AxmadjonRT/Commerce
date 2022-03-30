<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Currency;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function show()
    {
        $clients = Clients::all();
        return json_decode($clients);
    }

    public function store()
    {
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://openexchangerates.org/api/currencies.json',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        foreach ($data as $key => $value)
        {
            $currency = new Currency();
            $currency->short_name = $key;
            $currency->country = $value;  
            $currency->save();
        }
        
        return dd($currency);

    }
}
