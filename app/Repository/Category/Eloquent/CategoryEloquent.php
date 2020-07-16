<?php

declare (strict_types = 1);

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

    /**
     * Get all category
     *
     * @return object
     */
    public function all(): object
    {
        return $this->category->all();
    }

    /**
     * Get project has category
     *
     * @param  object  $data
     * @return object
     */
    public function hasProject(object $data): object
    {
        $c = $data->map(function ($item) use ($data) {
            return $item;
        });
        
        return $this->category->whereIn('id', $c->pluck('category_id'))->get();
    }

    /**
     * Edit category
     *
     * @param  string $id
     * @return object
     */
    public function edit(string $id): object
    {
        return $this->category->findOrFail($id);
    }

    /**
     * Save category
     *
     * @param  array  $data
     * @return bool
     */
    public function save(array $data): bool
    {
        return $this->category->create($data);
    }

    /**
     * Search Category by select2
     *
     * @param  array  $param
     * @return object
     */
    public function searchByName(array $param): object
    {
        $query = $this->category->query();

        if (isset($param['q'])) {
            $query->where('name', 'like', '%' . $param['q'] . '%');
        }

        return $query = $query->take(10)->get();
    }

    /**
     * Delete category
     *
     * @param  string $id
     * @return bool
     */
    public function delete(string $id): bool
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
}
