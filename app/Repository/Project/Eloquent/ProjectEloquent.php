<?php

namespace App\Repository\Project\Eloquent;

use App\Constants\CorauselStatus;
use App\Constants\ProjectStatus;
use App\Models\Project;
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
     *
     * @return object
     */
    public function all(): object
    {
        return $this->project->active()->latest()->get();
    }

    public function galery()
    {
        return $this->project->active()->latest()->paginate(9);
    }

    public function findById(string $id): object
    {
        return $this->project->findOrFail($id);
    }

    /**
     * Change project status
     *
     * @param  int $id
     * @return bool
     */
    public function changeStatus($id): bool
    {
        $project = $this->project->findOrFail($id);
        return $project->update([
            'status' => $project->status == true
            ? ProjectStatus::UNPUBLISH
            : ProjectStatus::PUBLISH,
        ]);
    }

    public function save(array $data): object
    {
        $project = $this->project->create([
            'title'       => $data['title'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
        ]);

        $project->file()->create([
            'project_id' => $project->id,
            'filename'   => $data['file'],
        ]);

        return $project;
    }

    public function update(string $id, array $data): object
    {
        $project = $this->findById($id);

        $project->update([
            'title'       => $data['title'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
        ]);

        $project->file()->update([
            'project_id' => $project->id,
            'filename'   => is_null($data['file']) ? $project->project_file_url : $data['file'],
        ]);

        return $project;
    }

    public function corausel()
    {
        return $this->project->corausel();
    }

    public function slick(string $id)
    {
        $project = $this->findById($id);

        return $project->update([
            'is_corausel' => $project->is_corausel == false
            ? CorauselStatus::ISCORAUSEL
            : CorauselStatus::ISNOTCORAUSEL,
        ]);
    }

    public function delete($id): bool
    {
        $project = $this->findById($id);
        $project->delete();
    }
}
