<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\TestModel;
use App\Services\TestService;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    //
    private $source;

    public function __construct(){
        $this->source = env('API_SOURCE');
    }

    public function test():JsonResponse  {
        $client = new Client([
            'base_uri' => $this->source,
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'ip/info')->getBody()->getContents();
        $response = json_decode($response);
        $response = $response->data;
        $data = [
            'countryCode' => $response->code,
            'countryName' => $response->country,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        (new TestService())->store($data);
        return response()->json($response);

        //OLD WAY
//        $response = $client->request('GET', 'ip/info')->getBody()->getContents();
//        $response = json_decode($response);
//        $response = $response->data;
//        TestModel::create([
//            'countryCode' => $response->code,
//            'countryName' => $response->country,
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now(),
//        ]);
    }
}
