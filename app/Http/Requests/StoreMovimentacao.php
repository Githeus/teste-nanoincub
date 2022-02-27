<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMovimentacao extends FormRequest
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
            'funcionario_id'=>'required|exists:funcionarios,id',
            'valor'=>'required|numeric',
            'tipo_movimentacao'=>['required',Rule::in(['entrada','saida'])],
            'observacao'=>'required|string'
        ];
    }
}
