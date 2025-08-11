<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMemberRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'cpf'=>'required|string|max:14|regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/',
            'phone'=>'required|string|max:15|regex:/^\d{8,15}$/',
            'address'=>'required|string',
            'birthdate' => 'required|date',
            'enrollment_date' => 'required|date',
            'contract_plan' => ['required', Rule::in(['plus','omega','ultra'])]
        ];
    }
}
