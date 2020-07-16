<?php

declare (strict_types = 1);

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = [
        'deleted_at',
    ];

    protected $appends = [
        'blog_file_url',
    ];

    /**
     * Get the blog post file
     *
     * @return HasOne
     */
    public function file(): HasOne
    {
        return $this->hasOne(BlogFile::class)->withDefault('blog_files');
    }

    /**
     * Get the category where category_id
     *
     * @return HasOne;
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    /**
     * Author of the blog post
     * 
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'created_by');
    }

    /**
     * Get blog post active status
     *
     * @param  object $query
     * @return object
     */
    public function scopeActive(object $query): object
    {
        return $query->where('status', true);
    }

    /**
     * Get blog post file url
     *
     * @return string
     */
    public function getBlogFileUrlAttribute(): string
    {
        return asset('storage/uploads/blogs/'
            . $this->file->filename
        );
    }
}
