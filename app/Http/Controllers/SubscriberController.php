<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\SubscriberDataTable;
use App\Http\Requests\SubsRequest;
use App\Repository\Subscriber\SubscriberRepo;

class SubscriberController extends Controller
{
    protected $subs;

    public function __construct(SubscriberRepo $subs)
    {
        $this->subs = $subs;
    }

    public function index(SubscriberDataTable $dataTable)
    {
    	return $dataTable->render('back.subscriber.index');
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
