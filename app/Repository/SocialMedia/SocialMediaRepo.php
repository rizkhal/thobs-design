<?php

declare (strict_types = 1);

namespace App\Repository\SocialMedia;

interface SocialMediaRepo
{
    /**
     * Get all social media
     * 
     * @return object
     */
    public function all(): object;

    /**
     * Save social media
     *
     * @param  array  $data
     * @return object
     */
    public function save(array $data): object;

    /**
     * Get social for where id
     *
     * @param  string $id
     * @return object
     */
    public function edit(string $id): object;

    /**
     * Update social
     *
     * @param  array  $data
     * @return bool
     */
    public function update(array $data): bool;

    /**
     * Delete social media
     * 
     * @param  string $id
     * @return bool
     */
    public function delete(string $id): bool;
}
