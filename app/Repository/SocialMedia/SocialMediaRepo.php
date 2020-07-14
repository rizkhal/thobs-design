<?php

declare (strict_types = 1);

namespace App\Repository\SocialMedia;

interface SocialMediaRepo
{
    /**
     * Save social media
     *
     * @param  array  $data
     * @return object
     */
    public function save(array $data): object;

    /**
     * Delete social media
     * 
     * @param  string $id
     * @return bool
     */
    public function delete(string $id): bool;
}
