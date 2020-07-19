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
     * Get all of the setting data
     *
     * @return array
     */
    public function all(): array
    {
        $contact = DB::select("SELECT * FROM contacts LIMIT 1");

        $about = DB::select("SELECT a.*, u.`name`, u.`description`, u.`profile_picture` FROM abouts AS a
                             LEFT JOIN users AS u ON a.`created_by` = u.`id`");

        return [
            'about'   => $about[0],
            'contact' => $contact[0],
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
                'external_url' => $links
            ]);
        } else {
            return false;
        }
    }
}
