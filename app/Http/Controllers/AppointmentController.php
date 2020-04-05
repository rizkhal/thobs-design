<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Appointment\AppointmentRepo;
use App\Http\Requests\Appointment\AppointmentRequest;

class AppointmentController extends Controller
{
	protected $app;

	public function __construct(AppointmentRepo $app)
	{
		$this->app = $app;
	}

    public function index()
    {
    	$apps = $this->app->all();
    	return view('back.appointment.index', compact('apps'));
    }

    public function store(AppointmentRequest $request)
	{
		$app = $this->app->store($request->data());
		return response()->json([
        	'success' => true,
        	'message' => 'Event request sent successfully '
        ], 200);
	}

	public function show($id)
	{
		$app = $this->app->detail($id);
		return view('back.appointment.show', compact('app'));
	}
}
