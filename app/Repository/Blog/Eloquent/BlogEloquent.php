<?php

declare (strict_types = 1);

namespace App\Repository\Blog\Eloquent;

use App\Models\Blog;
use App\Repository\Blog\BlogRepo;

class BlogEloquent implements BlogRepo
{
    protected $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Find the blog post where slug
     *
     * @param  string $slug
     * @return object|response
     */
    public function findBySlug(string $slug)
    {
        return $this->blog->where('slug', $slug)->firstOrFail();
    }

    /**
     * Save the blog post
     *
     * @param  array  $data
     * @return bool
     */
    public function save(array $data): bool
    {
        return $this->blog->create($data);
    }

    /**
     * Edit the blog post
     *
     * @param  string $slug
     * @param  array  $data
     * @return bool
     */
    public function edit(string $slug, array $data): bool
    {
        $blog = $this->findBySlug($slug);
        return $this->blog->update($data);
    }
}
