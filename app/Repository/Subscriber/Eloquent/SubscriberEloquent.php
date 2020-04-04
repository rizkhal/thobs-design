<?php declare(strict_types=1);

namespace App\Repository\Subscriber\Eloquent;

use App\Models\Subscriber;
use App\Repository\Subscriber\SubscriberRepo;

class SubscriberEloquent implements SubscriberRepo
{
	protected $subs;

	public function __construct(Subscriber $subs)
	{
		$this->subs = $subs;
	}

	public function all()
	{
		# code...
	}

	public function store(array $data)
	{
		return $this->subs->create($data);
	}
}