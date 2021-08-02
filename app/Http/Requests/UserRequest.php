<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }
    
    public function messages()
    {
        return [
            "name.required"     =>  "Este campo é origatório",
            "email.unique"      =>  "O Campo email ja existe no sistema!",
            "name.max"          =>  "O maximo são 255 caracteres",
            "email.required"    =>  "O Campo e-mail é obrigatório",
            "password.required" =>  "O Campo senha é obrigatório",
        ];
    }
}
