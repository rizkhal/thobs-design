<?php

namespace App\Repository\Project\Eloquent;

use App\Models\Project;
use App\Repository\Project\ProjectRepo;

class ProjectEloquent implements ProjectRepo
{
    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function save(array $data)
    {
        $project = $this->project->create([
            'title'   => $data['title'],
            'content' => $data['content'],
        ]);

        $project->file()->create([
            'project_id' => $project->id,
            'filename'   => $data['file'],
        ]);

        return $project;
    }
}
