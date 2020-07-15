<?php

declare (strict_types = 1);

namespace App\Repository\Blog\Eloquent;

use App\Constants\ProjectStatus;
use App\Models\Blog;
use App\Repository\Blog\BlogRepo;
use Illuminate\Support\Facades\Storage;

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
     * Change the blog post status
     *
     * @param  string $id
     * @return bool
     */
    public function changeStatus(string $id): bool
    {
        $blog = $this->blog->findOrFail($id);
        return $blog->update([
            'status' => $blog->status == true
            ? ProjectStatus::UNPUBLISH
            : ProjectStatus::PUBLISH,
        ]);
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

    /**
     * Delete the blog post
     *
     * @param  string $slug
     * @return bool
     */
    public function delete(string $slug): bool
    {
        $blog = $this->findBySlug($slug);
        Storage::delete("uploads/blog/{$blog->file->filename}");
        return $blog->delete();
    }
}
