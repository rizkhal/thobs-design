<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Subscriber\SubsRequest;
use App\Repository\Subscriber\SubscriberRepo;

class SubscriberController extends Controller
{
    protected $subs;

    public function __construct(SubscriberRepo $subs)
    {
        $this->subs = $subs;
    }

    public function index()
    {
    	return view('back.subscriber.index');
    }

    public function subscribe(SubsRequest $request)
    {
        $subs = $this->subs->store($request->data());
        return response()->json([
        	'success' => true,
        	'message' => 'Your email is registered '
        ], 200);
    }
}
