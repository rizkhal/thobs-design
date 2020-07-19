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
            'route'        => ['sometimes', 'string'],
            'background'    => ['sometimes', 'string', 'nullable'],
            'external_url' => ['sometimes', 'array'],
            'description'  => ['sometimes', 'string'],
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
            'id'           => $this->id,
            'route'        => $this->route,
            'background'    => $this->backround,
            'external_url' => $this->external_url,
            'description'  => $this->description,
        ];
    }
}
