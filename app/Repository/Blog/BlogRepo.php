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
         * @return bool
         */
        public function save(array $data): bool;

        /**
         * Edit the blog post
         * 
         * @param  string $slug
         * @param  array  $data
         * @return bool
         */
        public function edit(string $slug, array $data): bool;
    }
}
