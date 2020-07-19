<?php

use App\Models\About;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        About::create([
            'route'        => 'HaloDaengTobs',
            'background'   => 'https://via.placeholder/720',
            'external_url' => '["google:https://google.com","facebook:https://facebook.com","twitter:https://twitter.com"]',
            'description'  => 'Designer Graphic and Open Soure Enthusiast.',
        ]);
    }
}
