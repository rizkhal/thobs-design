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
     * @return object
     */
    public function save(array $data): object
    {
        $blog = $this->blog->create([
            'title'       => $data['title'],
            'slug'        => $data['slug'],
            'content'     => $data['content'],
            'category_id' => $data['category_id'],
        ]);

        $blog->file()->create([
            'blog_id'  => $blog->id,
            'filename' => $data['file'],
        ]);

        return $blog;
    }

    /**
     * Edit the blog post
     *
     * @param  string $slug
     * @param  array  $data
     * @return object
     */
    public function edit(string $slug, array $data): object
    {
        $blog = $this->findBySlug($slug);
        return $this->blog->update($data);
    }
}
