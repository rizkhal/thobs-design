<?php declare(strict_types=1);

namespace App\Repository\Appointment\Eloquent;

use App\Models\Appointment;
use App\Repository\Appointment\AppointmentRepo;

class AppointmentEloquent implements AppointmentRepo
{
	protected $app;

	public function __construct(Appointment $app)
	{
		$this->app = $app;
	}

	public function all()
	{
		return $this->app->all();
	}

	public function store(array $data)
	{
		return $this->app->create($data);
	}

	public function detail($id)
	{
		return $this->app->findOrFail($id);
	}
}