<?php declare (strict_types = 1);

namespace App\Repository\Project;

interface ProjectRepo
{
    /**
     * All project
     * @return object
     */
    public function all();

    public function galery();

    /**
     * Find project by id
     * @param  string $id
     * @return object
     */
    public function findById(string $id): ?object;

    /**
     * Change project status
     * @param  string $id
     * @return bool
     */
    public function changeStatus(string $id): ?bool;

    /**
     * Save project
     * @param  array  $data
     * @return object
     */
    public function save(array $data): ?object;

    public function slick(string $id);

    public function corausel();

    /**
     * Update project
     * @param  array $data
     * @return object
     */
    public function update(string $id, array $data): ?object;

    public function delete(string $id);

}
