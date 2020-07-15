<?php

declare (strict_types = 1);

namespace App\Repository\Blog;

if (! interface_exists('BlogRepo')) {
    interface BlogRepo
    {
        /**
         * Find the blog post where slug
         * 
         * @param  string $slug
         * @return object|response
         */
        public function findBySlug(string $slug);

        /**
         * Save the blog post
         * 
         * @param  array  $data
         * @return object
         */
        public function save(array $data): object;

        /**
         * Edit the blog post
         * 
         * @param  string $slug
         * @param  array  $data
         * @return object
         */
        public function edit(string $slug, array $data): object;

        /**
         * Delete the blog post
         * 
         * @param  string $slug
         * @return bool
         */
        public function delete(string $slug): bool;
    }
}