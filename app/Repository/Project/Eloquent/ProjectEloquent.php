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
        if (isset($data['is_broadcast'])) {
            $broadcast = true;
        } else {
            $broadcast = false;
        }

        $project = $this->project->create([
            'title'        => $data['title'],
            'content'      => $data['content'],
            'is_broadcast' => $broadcast,
            'category_id'  => $data['category_id'],
            'created_by'   => logged_in_user()->id,
        ]);

        $project->file()->create([
            'project_id' => $project->id,
            'filename'   => $data['file'],
        ]);

        return $project;
    }
}
