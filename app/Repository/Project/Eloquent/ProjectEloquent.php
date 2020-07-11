<?php

namespace App\Repository\Project\Eloquent;

use App\Models\Project;
use App\Jobs\ProjectBroadcastJob;
use App\Constants\ProjectStatus;
use App\Constants\CorauselStatus;
use App\Repository\Project\ProjectRepo;
use Illuminate\Database\Eloquent\Builder;

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
        return $this->project->active()->latest()->get();
    }

    public function galery()
    {
        return $this->project->active()->latest()->paginate(9);
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

        if($broadcast == true) {
            ProjectBroadcastJob::dispatch($project);
        }

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
                            : CorauselStatus::ISNOTCORAUSEL
        ]);
    }

    public function delete($id)
    {
        $project = $this->findById($id);
        $project->delete();
    }
}
