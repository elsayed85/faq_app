<?php

namespace App\Http\Requests\Admin\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        if ($this->isMethod("POST")) {
            return [
                'username' => ['required', 'max:60'],
                'password' => ['required' , 'min:6' , 'max:50']
            ];
        } elseif ($this->isMethod("PUT") || $this->isMethod("PATCH")) {
            return [
                'username' => ['sometimes', 'max:60'],
                'new_password' => ['sometimes' , 'nullable' , 'min:6' , 'max:50']
            ];
        }
        return [];
    }
}
