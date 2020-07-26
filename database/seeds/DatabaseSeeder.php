<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContactTableSeeder::class);
        // $this->call(UserTableSeeder::class);
        // factory(\App\Models\Url::class, 100)->create();
        // factory(\App\Models\User::class, 100)->create();
        // factory(\App\Models\Visit::class, 100)->create();
    }
}
