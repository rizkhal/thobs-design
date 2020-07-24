<?php

declare (strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'                      => ['sometimes', 'string', 'max:20'],
            'description'               => ['sometimes', 'string'],
            'profile_picture'           => ['sometimes', 'string'],
            'new_password'              => ['nullable', 'string', 'min:6'],
            'new_password_confirmation' => ['nullable', 'required_with:new_password', 'same:new_password'],
            'current_password'          => ['required', 'min:6', function ($attribute, $value, $failed) {
                if (!Hash::check($value, logged_in_user()->password)) {
                    return $failed(__('The current password is incorrect.'));
                }
            }],
        ];
    }

    /**
     * Get the user data from incoming request
     *
     * @return array
     */
    public function data(): array
    {
        return [
            'name'            => $this->name,
            'password'        => (!is_null($this->new_password)) ? bcrypt($this->new_password) : bcrypt($this->current_password),
            'profile_picture' => $this->file,
            'description'     => $this->description,
        ];
    }
}
