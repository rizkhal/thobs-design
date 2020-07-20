<?php

declare (strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'key'        => ['sometimes', 'array'],
            'value'      => ['sometimes', 'array'],
            'route'      => ['sometimes', 'string'],
            'background' => ['sometimes', 'file'],
        ];
    }

    /**
     * Get value from incoming request
     *
     * @return array
     */
    public function data(): array
    {
        return [
            'id'         => $this->id,
            'key'        => $this->key,
            'value'      => $this->value,
            'route'      => $this->route,
            'background' => $this->background,
        ];
    }
}
