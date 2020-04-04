<?php declare(strict_types=1);

namespace App\Repository\Order;

interface OrderRepo {

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

}