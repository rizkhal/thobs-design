<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'name'           => 'required|string',
            'email'          => 'required|email',
            'message'        => 'required|string',
            'appointment_at' => 'required|date',
        ];
    }

    public function data()
    {
        return [
            'name'           => $this->name,
            'email'          => $this->email,
            'message'        => $this->message,
            'appointment_at' => date('Y-m-d H:i:s', strtotime($this->appointment_at)),
        ];
    }
}
