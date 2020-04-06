<?php

namespace App\Repository\Project\Eloquent;

use Storage;
use App\Models\Project;
use App\Constants\ProjectStatus;
use App\Repository\Project\ProjectRepo;

class ProjectEloquent implements ProjectRepo
{
    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * All project where status active
     * @return object
     */
    public function all(): ?object
    {
        return $this->project->projectActive()->latest()->get();
    }

    public function findById(string $id): ?object
    {
        return $this->project->findOrFail($id);
    }

    /**
     * Change project status
     * @param  int $id
     * @return bool
     */
    public function changeStatus($id): ?bool
    {
        $project = $this->project->findOrFail($id);
        return $project->update([
            'status' => $project->status == true
                        ? ProjectStatus::UNPUBLISH
                        : ProjectStatus::PUBLISH,
        ]);
    }

    public function save(array $data): ?object
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
            'created_by'   => logged_in_user()->id,
        ]);

        $project->categories()->attach($data['categories']);

        $project->file()->create([
            'project_id' => $project->id,
            'filename'   => $data['file'],
        ]);

        return $project;
    }

    public function update(string $id, array $data): ?object
    {
        $project = $this->findById($id);
        if (isset($data['is_broadcast'])) {
            $broadcast = true;
        } else {
            $broadcast = false;
        }

        $project->update([
            'title'        => $data['title'],
            'content'      => $data['content'],
            'is_broadcast' => $broadcast,
            'created_by'   => logged_in_user()->id,
        ]);

        $project->categories()->sync($data['categories']);

        $project->file()->update([
            'project_id' => $project->id,
            'filename'   => $data['file'],
        ]);

        return $project;
    }

    public function delete($id)
    {
        $project = $this->findById($id);
        $project->delete();
    }
}
