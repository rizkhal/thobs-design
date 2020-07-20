<?php

declare (strict_types = 1);

namespace App\Repository\Setting\Eloquent;

use App\Models\About;
use App\Models\Contact;
use App\Repository\Setting\SettingRepo;
use Illuminate\Support\Facades\DB;
use Upload;

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

    private function uploadFile($request)
    {
        return Upload::from($request)
            ->to('setting')
            ->type('image')
            ->generateName('background')
            ->return();
    }

    private function clean($array)
    {
        return array_values(array_filter($array));
    }

    public function about(array $data): bool
    {
        if ($about = $this->about->find($data['id'])) {
            
            if (!is_null($data['background'])) {
                $filename = $this->uploadFile($data['background']);
            } else {
                $filename = $about->background;
            }

            $key   = $this->clean($data['key']);
            $value = $this->clean($data['value']);

            $external_url['external_url'] = array_combine($key, $value);
         
            return $about->update([
                'route'        => $data['route'],
                'background'   => $filename,
                'external_url' => $external_url,
            ]);
        } else {
            return false;
        }
    }
}
