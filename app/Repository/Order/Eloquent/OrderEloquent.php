<?php declare(strict_types=1);

namespace App\Repository\Order\Eloquent;

use App\Models\Order;
use App\Repository\Order\OrderRepo;

class OrderEloquent implements OrderRepo
{
	protected $order;

	public function __construct(Order $order)
	{
		$this->order = $order;
	}

	public function all()
	{
		# code...
	}

	public function store(array $data)
	{
		return $this->order->create($data);
	}
}