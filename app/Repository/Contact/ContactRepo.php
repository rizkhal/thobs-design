<?php

declare (strict_types = 1);

namespace App\Repository\Contact;

if (!interface_exists('ContactRepo')) {
    interface ContactRepo
    {
        /**
         * firstOrUpdate the contact
         *
         * @return bool
         */
        public function firstOrUpdate(array $data): bool;
    }
}
