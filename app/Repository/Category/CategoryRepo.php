<?php

declare (strict_types = 1);

namespace App\Repository\Category;

interface CategoryRepo
{

    /**
     * List all category
     *
     * @return object
     */
    public function all(): object;

    /**
     * Category Has Project
     *
     * @param  object  $data
     * @return object
     */
    public function hasProject(object $data): object;

    /**
     * Save into database
     *
     * @param  array  $data
     * @return object
     */
    public function save(array $data): object;

    /**
     * Handle select2 request
     *
     * @param  string $param
     * @return object
     */
    public function searchByName(array $param): object;

    /**
     * Get category for where id
     *
     * @param  string $id
     * @return object
     */
    public function edit(string $id): object;

    /**
     * Update category
     *
     * @param  array  $data
     * @return bool
     */
    public function update(array $data): bool;

    /**
     * Delete category
     *
     * @param  string $id
     * @return bool
     */
    public function delete(string $id): bool;

}
