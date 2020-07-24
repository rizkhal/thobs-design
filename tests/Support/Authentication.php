<?php

namespace Tests\Support;

use App\Models\User;

trait Authentication
{
    public function setUp(): void
    {
        parent::setUp();

        $ayu = factory(User::class)->create([
            'name'     => 'Ayu Wahyuni',
            'email'    => 'ayu@mail.com',
            'password' => bcrypt($this->userPassword()),
        ]);
    }

    protected function userPassword()
    {
        return 'password';
    }

    protected function user()
    {
        return User::where('email', 'ayu@mail.com')->first();
    }

    protected function loggedAyuIn()
    {
        return $this->actingAs($this->user());
    }
}
