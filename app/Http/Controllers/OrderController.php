<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OrderController extends Controller
{
    //
    public function show_tovars() {

        $url = 'https://id59636288.retailcrm.ru/api/v5/store/products';
        $client = new Client();

        $params = [
            'query' => [
                'apiKey' => '5ZYph4hiTZ8VFE3qGQml7bzb7Uky04Kh'
            ],
        ];
        $response = $client->get($url, $params);
        $data = json_decode($response->getBody(), true);
//        dd($data['products']);
        /*$curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
           'X-API-Key: 5ZYph4hiTZ8VFE3qGQml7bzb7Uky04Kh',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        dd($result);*/
        return view('tovars', ['products' => $data['products']]);
    }

    public function show_orders() {
        $url = 'https://id59636288.retailcrm.ru/api/v5/orders';
        $client = new Client();

        $params = [
            'query' => [
                'apiKey' => '5ZYph4hiTZ8VFE3qGQml7bzb7Uky04Kh'
            ],
        ];
        $response = $client->get($url, $params);
        $data = json_decode($response->getBody(), true);

        $url_tovar = 'https://id59636288.retailcrm.ru/api/v5/store/products';

        $response_tovar = $client->get($url_tovar, $params);
        $data_tovar = json_decode($response_tovar->getBody(), true);
//        dd($data_tovar);
        return view('orders', ['orders' => $data['orders'], 'products' => $data_tovar['products']]);
    }

    public function make_order(Request $request){
//        dd($request->get('inputName'));
        $client = new Client();
        $response = $client->request('POST',
            'https://id59636288.retailcrm.ru/api/v5/orders/create',
        ['form_params' => [
            'apiKey' => '5ZYph4hiTZ8VFE3qGQml7bzb7Uky04Kh',
            'order' => json_encode(['[items][][offer][id]' => $request->get('selectedProduct'),
                'firstName' => $request->get('inputName'),
                'phone' => $request->get('inputPhone'),
                'email' => $request->get('inputEmail')])
        ]]);
        $data = json_decode($response->getBody(), true);
//        dd($data);
        return back();
    }
}
