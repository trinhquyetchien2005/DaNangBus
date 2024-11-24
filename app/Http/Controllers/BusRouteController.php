<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BusRouteController extends Controller
{
    public function getRouteDetails()
    {
        $client = new Client();
        $response = $client->get('https://ecobus.danang.gov.vn/api/api/Route/GetRouteDetail?id=33220e6e-baed-4fd3-9fd8-7c90cf9e290e&codeRequest=TRBUm');
        $data = json_decode($response->getBody()->getContents(), true);

        if ($data) {
            return response()->json($data);
        }

        return response()->json(['message' => 'Không có dữ liệu'], 404);
    }
}
