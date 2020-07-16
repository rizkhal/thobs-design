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
     * Get all of active the blog post
     * And filter where category request
     *
     * @return object
     */
    public function all(): object
    {
        $where = function ($query) {
            if ($filter = request()->get('category')) {
                return $query->active()->whereHas('category', function ($query) use ($filter) {
                    $query->where('name', $filter);
                });
            }
        };

        $posts = $this->blog->active()->where($where)->latest()->paginate(2);
        return $posts->appends(request()->only('category'));
    }

    /**
     * Take 3 the active blog posts
     *
     * @return object
     */
    public function widget(): object
    {
        return $this->blog->active()->take(3)->get();
    }

    /**
     * Find the blog post where slug
     *
     * @param  string $slug
     * @return object|response
     */
    public function findBySlug(string $slug)
    {
        $post = $this->blog->where(function ($query) use ($slug) {
            return $query->where('slug', $slug)
                ->where('deleted_at', null)
                ->where('status', ProjectStatus::PUBLISH);
        })->firstOrFail();

        if (!auth()->user()) {
            $post->increment('view');
        }

        return $post;
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
        $blog->update([
            'title'       => $data['title'],
            'content'     => $data['content'],
            'category_id' => $data['category_id'],
        ]);

        $blog->file()->update([
            'blog_id'  => $blog->id,
            'filename' => is_null($data['file']) ? $blog->file->filename : $data['file'],
        ]);

        return $blog;
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
