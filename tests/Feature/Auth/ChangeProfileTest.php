<?php

namespace Tests\Feature\Auth;

use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ChangeProfileTest extends TestCase
{
    protected function getRoute()
    {
        return route('admin.setting.profile.index');
    }

    protected function postRoute()
    {
        return route('admin.setting.profile.update');
    }

    /**
     * @test
     * @group f-change profile
     */
    public function userChangePasswordWithCorrectCredentials()
    {
        $this->loggedAyuIn();

        $user = $this->user();

        $response = $this
            ->from($this->getRoute())
            ->post($this->postRoute(), [
                'name'                      => $user->name,
                'current_password'          => $this->userPassword(),
                'new_password'              => 'ayu-new-password',
                'new_password_confirmation' => 'ayu-new-password',
                'description'               => 'Ecdemomania.',
            ]);

        $response->assertRedirect($this->getRoute())->assertSessionHas('notice');

        $this->assertTrue(
            Hash::check(
                'ayu-new-password',
                $user->fresh()->password
            )
        );
    }

    /**
     * @test
     * @group f-change profile
     */
    public function userCurrentPasswordDoesnotMatch()
    {
        $this->loggedAyuIn();

        $user = $this->user();

        $response = $this->from($this->getRoute())->post($this->postRoute(), [
            'name'                      => $user->name,
            'current_password'          => 'ayu-invalid-password',
            'new_password'              => 'ayu-new-password',
            'new_password_confirmation' => 'ayu-new-password',
            'description'               => 'Ecdemomania.',
        ]);

        $response->assertRedirect($this->getRoute())->assertSessionHasErrors('current_password');

        $this->assertFalse(
            Hash::check(
                'new-awesome-password',
                $user->fresh()->password
            )
        );
    }

    /**
     * @test
     * @group f-change profile
     * @dataProvider newPasswordFail
     */
    public function userNewPasswordValidationFailed($data1, $data2)
    {
        $this->loggedAyuIn();

        $user = $this->user();

        $response = $this->from($this->getRoute())->post($this->postRoute(), [
            'current_password'          => $this->userPassword(),
            'new_password'              => $data1,
            'new_password_confirmation' => $data2,
            'description'               => 'Ecdemomania.',
        ]);

        $response->assertRedirect($this->getRoute())->assertSessionHasErrors('new_password');

        $this->assertFalse(
            Hash::check(
                $data1,
                $user->fresh()->password
            )
        );
    }

    public function newPasswordFail()
    {
        return [
            ['new', 'new'], // min:6

            // ['', ''], // required
            // [$this->userPassword(), $this->userPassword()], // different
            // [null, null], // string
            // ['new-password', 'new-pass-word'], // confirmed

            // Laravel NIST Password Rules
            // [str_repeat('a', 9), str_repeat('a', 9)], // repetitive
            // ['12345678', '12345678'], // sequential
        ];
    }
}
