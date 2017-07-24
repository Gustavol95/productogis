<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubclientesRequest extends FormRequest
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

        if($this->method()=='PUT'){

            $params = $this->route()->parameters();
            $id = $params['subcliente'];    

            return [
                //'cliente_id' => 'integer|required|min:1',
                'nombre' => 'string|required|min:1|max:255',
                'celular' =>'alpha_num|required|max:10',
                'email' =>'string|required|email|max:64',
                'fecha_nacimiento'=>'required',
                'calle' => 'string|required|max:255',
                'numero_exterior'=>'alpha_num|required|min:1|max:5',
                'cp' =>'alpha_num|required|min:5|max:5',
            ];

        }else {

            return [
                //'cliente_id' => 'integer|required|min:1',
                'nombre' => 'string|required|min:1|max:255',
                'celular' =>'alpha_num|required|max:10',
                'email' =>'string|required|email|max:64',
                'fecha_nacimiento'=>'required',
                'calle' => 'string|required|max:255',
                'numero_exterior'=>'alpha_num|required|min:1|max:5',
                'cp' =>'alpha_num|required|min:5|max:5',
            ];
        }
    }
}