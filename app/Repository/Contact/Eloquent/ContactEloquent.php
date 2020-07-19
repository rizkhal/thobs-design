<?php

declare (strict_types = 1);

namespace App\Repository\Contact\Eloquent;

use App\Models\Contact;
use App\Repository\Contact\ContactRepo;

class ContactEloquent implements ContactRepo
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
}
