<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|numeric|digits:11|unique:users,phone',
            'password' => 'required|min:4',
        ];
    }

    /**
     * Customize error messages (optional).
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'phone.required' => 'Phone number is required.',
            'phone.numeric' => 'Phone number must be a valid number.',
            'phone.digits' => 'Phone number must be exactly 11 digits.',
            'phone.unique' => 'Phone number already exists.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 4 characters.',
        ];
    }
}
