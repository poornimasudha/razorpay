<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use Razorpay\Api\Api;

class PoornimaController extends Controller
{
    protected function subscribe(){
        $request=Request::all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $subscription  = $api->subscription->create(array(
                'plan_id' =>$request['plan'],
                'customer_notify' => 0,
                'total_count' => 6,
            )
        );
        return response()->json($subscription);
    }
}
