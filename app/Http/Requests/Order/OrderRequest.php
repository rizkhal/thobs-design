<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'event_date' => 'required|date',
            'name'       => 'required|string',
            'email'      => 'required|email',
            'message'    => 'required|string',
        ];
    }

    public function data()
    {
        return [
            'event_date' => date('Y-m-d', strtotime($this->event_date)),
            'name'       => $this->name,
            'email'      => $this->email,
            'message'    => $this->message,
        ];
    }
}
