<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updeatedAllOffers extends FormRequest
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
            'name'             => 'required|string|max:255',
            'image'            => 'nullable|image', // يجب أن يكون ملف صورة
            'title'            => 'required|string|max:255',
            'address'          => 'required|string|max:255',
            'newPrice'         => 'required|numeric|min:0',
            'oldPrice'         => 'required|numeric|min:0',
            'city'             => 'required|exists:cities,id', // التأكد من وجود المدينة
            'specialization'   => 'required|exists:specializations,id', // التأكد من وجود التخصص
        ];
    }
    
}
