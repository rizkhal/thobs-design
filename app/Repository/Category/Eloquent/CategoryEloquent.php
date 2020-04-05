<?php

namespace App\Repository\Category\Eloquent;

use App\Models\Category;
use App\Repository\Category\CategoryRepo;

class CategoryEloquent implements CategoryRepo
{
	protected $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	public function save(array $data)
	{
		return $this->category->create($data);
	}

	public function searchByName(array $param)
    {
        $query = $this->category->query();

        if (isset($param['q'])) {
            $query->where('name', 'like', '%' . $param['q'] . '%');
        }

        return $query = $query->take(10)->get();
    }
}