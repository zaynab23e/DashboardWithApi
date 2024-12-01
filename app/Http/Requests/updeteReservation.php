<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updeteReservation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|unique:reservations,phone,',
            'date' => 'nullable|date',
            'time' => 'nullable|date_format:H:i',
            'doctor_id' => 'nullable|exists:doctors,id|required_without:offer_id',
            'offer_id' => 'nullable|exists:offers,id|required_without:doctor_id',
        ];
    }
}
