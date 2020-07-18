<?php

declare (strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $rule = ['sometimes', 'string'];

        return [
            'open'        => $rule,
            'close'       => $rule,
            'phone'       => $rule,
            'address'     => $rule,
            'description' => $rule,
        ];
    }

    /**
     * Get the contact data from incoming request
     *
     * @return array
     */
    public function data(): array
    {
        return [
            'open'        => $this->open,
            'close'       => $this->close,
            'phone'       => $this->phone,
            'address'     => $this->address,
            'description' => $this->description,
        ];
    }
}
