<?php

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $timestamp = time() + 60 * 60;

        Contact::create([
            'open'        => date('H:i'),
            'close'       => date('H:i', $timestamp),
            'phone'       => '038023801',
            'address'     => 'Makassar',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, autem.',
        ]);
    }
}
