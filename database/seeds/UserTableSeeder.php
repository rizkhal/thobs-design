<?php

use App\Models\About;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $user = User::create([
            'name'        => 'Daeng Thobs',
            'email'       => 'admin@mail.com',
            'password'    => bcrypt('secret'),
            'description' => 'Designer Graphic and Open Source Entusiast.',
        ]);

        About::create([
            'background'   => 'https://via.placeholder/720',
            'external_url' => '{"external_url": {"Blog": "https://rizkhal.github.io", "Medium": "https://medium.com/@rizkhallamaau", "Dribbble": "https://dribbble.com/rizkhal"}}',
            'created_by'   => $user->id,
        ]);
    }
}
