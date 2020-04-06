<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    protected $guarded = [];

    public function project()
    {
    	return $this->belongsTo(Project::class)->withDefault('project_files');
    }
}