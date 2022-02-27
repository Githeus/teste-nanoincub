<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFuncionario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_completo'=>'required|string',
            'login'=>'required|string|unique:funcionarios,login',
            'senha'=>'required|string',
            'saldo_atual'=>'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'login.unique'=>'Este login já esta sendo utilizado',
        ];
    }
}
