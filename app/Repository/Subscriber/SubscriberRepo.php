<?php declare(strict_types=1);

namespace App\Repository\Subscriber;

interface SubscriberRepo {

	/**
	 * List all subscribers
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function all();

	/**
	 * Subscribe
	 * @param  array $data
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function store(array $data);

}