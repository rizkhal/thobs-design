<?php

declare (strict_types = 1);

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogFile extends Model
{
    protected $guarded = [];

    /**
     * Get the blog post where project file
     *
     * @return BelongsTo
     */
    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class)->withDefault('project_files');
    }
}
