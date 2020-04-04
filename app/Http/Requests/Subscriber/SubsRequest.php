<?php declare(strict_types=1);

namespace App\Http\Requests\Subscriber;

use Illuminate\Foundation\Http\FormRequest;

class SubsRequest extends FormRequest
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
    public function rules(): ?array
    {
        return [
            'email' => 'required|email|unique:subscribers'
        ];
    }

    public function data(): ?array
    {
        return [
            'email' => $this->email,
        ];
    }
}
