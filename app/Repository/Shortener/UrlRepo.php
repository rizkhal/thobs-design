<?php

declare (strict_types = 1);

namespace App\Repository\Shortener;

if (!interface_exists('UrlRepo')) {
    interface UrlRepo
    {
        /**
         * Shorten of the url
         *
         * @param  string $id
         * @param  array  $data
         * @return object
         */
        public function shortenUrl(string $id, array $data): object;
    }
}
