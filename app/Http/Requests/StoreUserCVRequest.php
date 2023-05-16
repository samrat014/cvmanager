<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserCVRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
             "name" => 'required',
             "phone" => 'required|min:10',
             "email" => 'required|email',
             "technology" => 'required',
//             "level" => 'required',
//             "salary" => 'required',
             "experience" => 'required',
             "document" => 'required|file|mimes:jpg,png,pdf',
//            "references" => 'required',
        ];
    }
}
