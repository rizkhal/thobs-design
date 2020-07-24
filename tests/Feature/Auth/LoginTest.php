<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    protected function successfulLoginRoute()
    {
        return route("dashboard");
    }

    protected function getRoute()
    {
        return route("login");
    }

    protected function postRoute()
    {
        return route("login");
    }

    protected function guestMiddlewareRoute()
    {
        return route('home');
    }

    /**
     * @test
     * @group f-auth
     */
    public function userCanViewLoginForm()
    {
        $response = $this->get($this->getRoute());
        $response->assertSuccessful()->assertViewIs("auth.login");
    }

    /**
     * @test
     * @group f-auth
     */
    public function userCanLoginWithCorrectCredentials()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make($password = "i-love-ayu"),
        ]);

        $response = $this->post($this->postRoute(), [
            'email'    => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect($this->successfulLoginRoute());

        $this->assertDatabaseHas('users', [
            'name'  => $user->name,
            'email' => $user->email,
        ]);

        $this->assertAuthenticatedAs($user);
    }

    /**
     * @test
     * @group f-login
     */
    public function userCanLoginWithIncorrectCredentials()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make('i-love-ayu'),
        ]);

        $response = $this->from($this->getRoute())->post($this->postRoute(), [
            'email'    => $user->email,
            'password' => 'invalid-password',
        ]);

        $response
            ->assertRedirect($this->getRoute())
            ->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * @test
     * @group f-login
     */
    public function userUnauthenticatedCannotAccessTheDashboard()
    {
        $this->get($this->successfulLoginRoute())->assertRedirect('/login');
    }

    /**
     * @test
     * @group f-login
     */
    public function userCannotLoginWithEmailDoesNotExists()
    {
        $response = $this->from($this->getRoute())->post($this->postRoute(), [
            'email'    => 'ayuwahyuni@mail.com',
            'password' => 'ayuwahyuni-password',
        ]);

        $response
            ->assertRedirect($this->getRoute())
            ->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
