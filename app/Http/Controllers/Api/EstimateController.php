<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\HttpService;

class EstimateController extends Controller
{
    public function checkEstimates(Request $request) {
        // Instantiate the HttpClientService
        $httpService = new HttpService();

        $headers = [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMDgwMTVjZGI4OWMxNjFiYzIiLCJpYXQiOjE2ODg2MTM3NTEsImp0aSI6MTY4ODYxMzc1MX0.GLtXpd03Gdw2GXHqYOvNGfYBNAVWcrXiJzALKyE0NMA',
            'Accept' => 'application/json',
        ];

        //dd($request->all());
        $data = [
            "data" => [
                "attributes" =>
                    $request->all()
            ]
        ];
        // Make a POST request with the authentication header and payload
        $response = $httpService->post('https://api.staging.quadx.xyz/v2/orders/estimates/rates', $data, $headers);

        return $response->json();
    }
}
