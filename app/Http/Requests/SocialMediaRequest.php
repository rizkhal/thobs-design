<?php

declare (strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SocialMediaRequest extends FormRequest
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
            'link'     => ['string', Rule::unique('social_media')->ignore($this->id)],
            'platform' => ['integer'],
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
            'id'       => $this->id,
            'link'     => $this->link,
            'platform' => $this->platform,
        ];
    }
}
