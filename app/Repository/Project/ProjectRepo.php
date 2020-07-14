<?php

declare (strict_types = 1);

namespace App\Repository\Project;

interface ProjectRepo
{
    /**
     * Get all project
     *
     * @return object
     */
    public function all(): object;

    /**
     * Galery of the project
     *
     * @return object
     */
    public function galery(): object;

    /**
     * Find project by id
     *
     * @param  string $id
     * @return object
     */
    public function findById(string $id): object;

    /**
     * Change project status
     *
     * @param  string $id
     * @return bool
     */
    public function changeStatus(string $id): bool;

    /**
     * Save project
     *
     * @param  array  $data
     * @return object
     */
    public function save(array $data): object;

    /**
     * Update project
     *
     * @param  array $data
     * @return object
     */
    public function update(string $id, array $data): object;

    /**
     * Delete the project
     * 
     * @param  string $id
     * @return bool
     */
    public function delete(string $id): bool;

}
