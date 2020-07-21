<?php

declare (strict_types = 1);

namespace App\Http\Requests;

use App\Rules\StrAlphaUnderscore;
use App\Rules\Url\DomainBlacklist;
use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
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
            'long_url'   => ['required', 'url', 'max:65535', new DomainBlacklist],
            'custom_key' => ['nullable', 'max:20', new StrAlphaUnderscore, 'unique:urls,keyword'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'long_url.required' => __('Must be filled, should not be empty.'),
            'long_url.url'      => __('Incorrect link format. The link must begin "http://" or "https://".'),
            'custom_key.max'    => __('The custom url may not be greater than :max characters.'),
            'custom_key.unique' => __(':input has already been taken'),
        ];
    }

    /**
     * Get the data from incoming request
     *
     * @return array
     */
    public function data(): array
    {
        return [
            'long_url'   => $this->long_url,
            'custom_key' => $this->custom_key,
        ];
    }
}
