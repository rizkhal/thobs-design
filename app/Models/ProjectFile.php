<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectFile extends Model
{
    protected $guarded = [];

    /**
     * Get the project where project file
     * 
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
    	return $this->belongsTo(Project::class)->withDefault('project_files');
    }
}
