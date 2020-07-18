<?php

declare (strict_types = 1);

namespace App\Repository\Setting;

if (!interface_exists('SettingRepo')) {
    interface SettingRepo
    {
        /**
         * Get all of the setting data
         * 
         * @return array
         */
        public function all(): array;

        /**
         * Save or update the contact page
         * 
         * @param  array  $data
         * @return bool
         */
        public function contact(array $data): bool;

        /**
         * Save or update the about page
         * 
         * @param  array  $data
         * @return bool
         */
        public function about(array $data): bool;
    }
}
