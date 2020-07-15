<?php

declare (strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BlogRequest extends FormRequest
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
            'title'       => ['string', 'required'],
            'body'        => ['string', 'required'],
            'file'        => [$this->method() == 'POST' ? 'required' : 'nullable', 'string'],
            'category_id' => ['integer', 'required'],
        ];
    }

    /**
     * Get the blog post data from incoming form request
     *
     * @param array
     */
    public function data(): array
    {
        return [
            'title'       => $this->title,
            'file'        => $this->file,
            'slug'        => Str::slug($this->title, '-') . '-' . time(),
            'content'     => $this->body,
            'category_id' => $this->category_id,
        ];
    }
}
