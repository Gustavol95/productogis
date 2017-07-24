<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PruebaRequest extends FormRequest
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



               return [
                   'nombre' =>'string|required|min:2|max:70',


               ];

           }else{

               return [
                  'nombre' =>'string|required|min:2|max:70',
               ];
           }
    }
}
