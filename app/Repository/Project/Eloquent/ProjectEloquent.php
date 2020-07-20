<?php

namespace App\Repository\Project\Eloquent;

use App\Constants\ProjectStatus;
use App\Models\Project;
use App\Repository\Project\ProjectRepo;
use Illuminate\Support\Facades\Storage;

class ProjectEloquent implements ProjectRepo
{
    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * All active projects
     *
     * @return object
     */
    public function all(): object
    {
        return $this->project->active()->latest()->take(8)->get();
    }

    /**
     * Galery of the project
     *
     * @return object
     */
    public function project(): object
    {
        return $this->project->active()->with('category')->latest()->paginate(24);
    }

    /**
     * Find project where id
     *
     * @param  string $id
     * @return object
     */
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
    public function changeStatus(string $id): bool
    {
        $project = $this->project->findOrFail($id);

        return $project->update([
            'status' => $project->status == true
            ? ProjectStatus::UNPUBLISH
            : ProjectStatus::PUBLISH,
        ]);
    }

    /**
     * Save project
     *
     * @param  array  $data
     * @return object
     */
    public function save(array $data): object
    {
        $project = $this->project->create([
            'title'       => $data['title'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
            'created_by'  => logged_in_user()->id,
        ]);

        $project->file()->create([
            'project_id' => $project->id,
            'filename'   => $data['file'],
        ]);

        return $project;
    }

    /**
     * Update project
     *
     * @param  string $id
     * @param  array  $data
     * @return object
     */
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
            'filename'   => is_null($data['file']) ? $project->file->name : $data['file'],
        ]);

        return $project;
    }

    /**
     * Delete project
     *
     * @param  string $id
     * @return bool
     */
    public function delete(string $id): bool
    {
        $project = $this->findById($id);
        Storage::delete("uploads/project/{$project->file->filename}");
        return $project->delete();
    }
}
