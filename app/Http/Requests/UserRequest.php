<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'name'                  => 'required|max:255',
            'email'                 => 'required|email|max:100|unique:users',
            'login'                 => 'required|max:30|unique:users,email,'.$id.'',
            'password'              => 'required|confirmed|min:4',
            'password_confirmation' => 'required|min:6',
        ];
    }



    public function messages()
    {
        return [
            'name.required'                   => 'É obrigatório inserir o Nome',
            'name.max'                        => 'O nome deve ter no maximo :max caracteres',
            
            'email.required'                  => 'É obrigatório inserir o Email.',
            'email.email'                     => 'Inserir formato de email correto, EX: exemplo@domain.com.',
            'email.max'                       => 'O Email deve ter no maximo :max caracteres.',
            'email.unique'                    => 'Não pode haver Email Iguais, digite outro por favor.', 

            'login.required'                  => 'É obrigatório inserir o Login',
            'login.max'                       => 'O Login deve ter no maximo :max caracteres',
            'login.unique'                    => 'Não pode haver Logins Iguais, digite outro por favor.',
            
            'password.required'               => 'É obrigatório inserir a Senha',
            'password.confirmed'              => 'O campo Senha esta com valor diferente do campo Confirmar Senha.',
            'passaword.min'                   => 'Digitar ao menos :min caracteres para a sua senha',

            'password_confirmation.required'  => 'É obrigatório inserir a Confirmação de Senha.',
            'password_confirmation.confirmed' => 'O campo Confirmar Senha esta com valor diferente do campo Senha.',
            'passaword_confirmation.min'      => 'Digitar ao menos :min caracteres para a sua senha.',

        ];

    }





}
