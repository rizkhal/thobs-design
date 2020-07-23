<?php

declare (strict_types = 1);

namespace App\Repository\Shortener;

if (!interface_exists('UrlRepo')) {
    interface UrlRepo
    {
        /**
         * Raw charts
         * 
         * @return array
         */
        public function countWhereWeek();

        public function countAllPeriod();

        public function bannerChart();

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
