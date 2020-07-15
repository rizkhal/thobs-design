<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $guarded = [];

    public function project(): BelongsTo
    {
    	return $this->belongsTo(Project::class);
    }
}
