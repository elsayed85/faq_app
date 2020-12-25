<?php

namespace App\Http\Requests\Student;

use App\Rules\Student\PasswordMatchedRule;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => ['required' , 'max:40' , new PasswordMatchedRule],
            "new_password" => ['required' , 'confirmed' , 'max:40']
        ];
    }
}
