<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateAll extends FormRequest
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
            'name'            => 'nullable|string',
            'price'           => 'nullable|string',
            'details'         => 'nullable|string',
            'Waitingtime'     => 'nullable|string',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address'         => 'nullable|string',
            'city'            => 'nullable|exists:cities,id', // Validate city ID
            'specialization'  => 'nullable|exists:specializations,id', // Validate specialization ID
        
        ];
    }
}
