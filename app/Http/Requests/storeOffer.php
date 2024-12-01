<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeOffer extends FormRequest
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
            'name'=>'required|string',
            'image'=> 'nullable',
            'address'=>'required|string',
            'title'=>'required|string',
            'newPrice'=>'required|numeric',
            'oldPrice'=>'required|numeric',
            'city'            => 'required|exists:cities,id', // Validate city ID
            'specialization'  => 'required|exists:specializations,id',
            
        ];
    }
}
