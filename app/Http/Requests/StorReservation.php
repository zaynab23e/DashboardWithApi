<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorReservation extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:reservations,phone',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'doctor_id' => 'nullable|exists:doctors,id|required_without:offer_id', // Doctor must be provided if offer is not.
            'offer_id' => 'nullable|exists:offers,id|required_without:doctor_id', // Offer must be provided if doctor is not.
        ];
    }
}
