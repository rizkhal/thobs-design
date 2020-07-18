<?php

declare (strict_types = 1);

namespace App\Repository\Setting\Eloquent;

use App\Models\Contact;
use App\Repository\Setting\SettingRepo;
use Illuminate\Support\Facades\DB;

class SettingEloquent implements SettingRepo
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    private function query($table)
    {
        return DB::select("SELECT * FROM $table LIMIT 1");
    }

    /**
     * Get all of the setting data
     *
     * @return array
     */
    public function all(): array
    {
        return [
            'contact' => $this->query("contacts")[0],
            'about'   => 'aa',
        ];
    }

    public function contact(array $data): bool
    {
        if ($contact = $this->contact->find($data['id'])) {
            return $contact->update($data);
        } else {
            return false;
        }
    }

    public function about(array $data): bool
    {
        # code...
    }
}
