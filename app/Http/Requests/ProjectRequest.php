<?php

declare (strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title'       => ['required', 'string'],
            'file'        => [$this->method() == 'POST' ? 'required' : 'nullable', 'string'],
            'category_id' => ['required', 'integer'],
            'description' => ['required', 'string'],
        ];
    }

    /**
     * Get the data
     *
     * @return array
     */
    public function data(): array
    {
        return [
            'title'       => $this->title,
            'file'        => $this->file,
            'category_id' => $this->category_id,
            'description' => $this->description,
        ];
    }
}
