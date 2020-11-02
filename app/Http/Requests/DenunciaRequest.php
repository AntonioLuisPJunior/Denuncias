<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DenunciaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'den_observacao' => 'max:25',
            'den_localizacao' => 'required|min:5|max:50',
            'den_quantidade_pessoas' => 'required|integer|min:2|max:500',
        ];
    }

    public function messages() {
        return [
            'den_observacao.max' => 'Este valor deve ter no maximo :max caracteres',

            'den_localizacao.required' => 'Informe uma localização',
            'den_localizacao.min' => 'Este valor deve ter no minimo :min caracteres',
            'den_localizacao.max' => 'Este valor deve ter no maximo :max caracteres',
            
            'den_quantidade_pessoas.required' => 'Informe uma quantidade estimada de pessoas na aglomeracao',
            'den_quantidade_pessoas.integer' => 'Esta quantidade deve ter um numero inteiro',
            'den_quantidade_pessoas.min' => 'Este valor deve ser no minimo :min',
            'den_quantidade_pessoas.max' => 'Este valor deve ser no maximo :max',
        ];
    }
}
