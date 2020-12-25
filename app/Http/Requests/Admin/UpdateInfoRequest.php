<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfoRequest extends FormRequest
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
            "name" => ['sometimes', 'min:3', 'max:30'],
            'email' => ['sometimes', 'email', 'unique:admins,email,' . auth()->guard("admin")->id() . ',id']
        ];
    }
}
