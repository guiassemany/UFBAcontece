<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreEventoRequest extends Request
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
          'titulo' => 'required',
          'descricao' => 'required',
          'categoria_id' => 'required',
          'departamento_id' => 'required',
          'data_inicio' => 'required',
          'data_fim' => 'required',
          'endereco' => 'required',
          'ativo' => 'required',
          'imagem' => 'image|mimes:jpeg,bmp,png|required_if:imagem,==,null',
        ];
    }
}
