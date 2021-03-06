<?php

declare (strict_types = 1);

namespace App\Repository\Shortener;

if (!interface_exists('UrlRepo')) {
    interface UrlRepo
    {
        /**
         * Count all clicked and visits
         * 
         * @return array
         */
        public function allCount(): array;

        /**
         * Banner stats clicks and redirect charts
         * 
         * @return object
         */
        public function bannerChart(): object;

        /**
         * Shorten of the url
         *
         * @param  string $id
         * @param  array  $data
         * @return object
         */
        public function shortenUrl(string $id, array $data): object;

        /**
         * Find the url
         *
         * @param  string $id
         * @return object
         */
        public function findUrl(string $id): object;

        /**
         * Edit the url
         *
         * @param  string $id
         * @param  array  $data
         * @return bool
         */
        public function edit(string $id, array $data): bool;

        /**
         * Delete the url
         *
         * @param  string $id
         * @return bool
         */
        public function delete(string $id): bool;
    }
}
