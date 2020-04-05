<?php declare(strict_types=1);

namespace App\Repository\Appointment;

interface AppointmentRepo {

	/**
	 * List all your event
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function all();

	/**
	 * Store order event photo
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function store(array $data);

	/**
	 * Detail
	 * @param  string $id
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function detail($id);

}