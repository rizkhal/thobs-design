<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repository\User\UserRepo;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(UserRepo $user)
    {
        $this->user = $user;
    }

    public function profile()
    {
        return view('backend::profile.index', [
            'user' => logged_in_user(),
        ]);
    }

    public function update(UserRequest $request)
    {
        if ($this->user->update(logged_in_user()->id, $request->data())) {
            notice('success', 'Successfully update your profile.');
            return redirect()->back();
        } else {
            notice('danger', 'Something went wrong, please contact the administrator.');
            return redirect()->back();
        }
    }
}
