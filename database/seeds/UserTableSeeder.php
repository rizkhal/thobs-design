<?php

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

        User::create([
            'name' => 'Daeng Thobs',
            'email' => 'admin@mail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
