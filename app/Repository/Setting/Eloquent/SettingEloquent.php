<?php

declare (strict_types = 1);

namespace App\Repository\Setting\Eloquent;

use App\Models\About;
use App\Models\Contact;
use App\Repository\Setting\SettingRepo;
use Illuminate\Support\Facades\DB;

class SettingEloquent implements SettingRepo
{
    protected $contact, $about;

    public function __construct(
        About $about,
        Contact $contact
    ) {
        $this->about   = $about;
        $this->contact = $contact;
    }

    /**
     * Query get limit one row from table
     *
     * @param  string $table
     * @return array
     */
    private function query(string $table): array
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
            'about'   => $this->query("abouts")[0],
            'contact' => $this->query("contacts")[0],
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
        if ($about = $this->about->find($data['id'])) {
            $links      = json_encode(array_values(array_filter($data['external_url'])));
            $background = (is_null($data['background'])) ? $about->background : $data['background'];

            return $about->update([
                'route'        => $data['route'],
                'background'   => $data['background'],
                'external_url' => $links,
                'description'  => $data['description'],
            ]);
        } else {
            return false;
        }
    }
}
