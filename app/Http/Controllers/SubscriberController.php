<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
    	return view('back.subscriber.index');
    }

    public function subscribe(Request $request)
    {
    	$subs = Subscriber::create(['email'=>$request->email]);
        return response()->json([
        	'success' => true,
        	'message' => 'Your email is registered '
        ], 200);
    }
}
