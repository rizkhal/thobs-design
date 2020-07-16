<?php

declare (strict_types = 1);

namespace App\Repository\SocialMedia\Eloquent;

use App\Models\SocialMedia;
use App\Repository\SocialMedia\SocialMediaRepo;

class SocialMediaEloquent implements SocialMediaRepo
{
    protected $model;

    public function __construct(SocialMedia $model)
    {
        $this->model = $model;
    }

    /**
     * Get the all social media
     * 
     * @return object
     */
    public function all(): object
    {
        return $this->model->all();
    }

    /**
     * Save social media
     *
     * @param  array  $data
     * @return object
     */
    public function save(array $data): object
    {
        return $this->model->create($data);
    }

    /**
     * Delete social media
     * 
     * @param  string $id
     * @return bool
     */
    public function delete(string $id): bool
    {
        $socialMedia = $this->model->findOrFail($id);
        return $socialMedia->delete();
    }
}
