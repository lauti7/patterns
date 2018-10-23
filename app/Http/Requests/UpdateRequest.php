<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$this->route('usuario')
        ];
    }

    public function messages()
    {
        return[
            'name.required'  => 'El campo ´Nombre´ tiene que ser completado',
            'email.required' => 'El campo ´Email´ tiene que ser completado',
            'email.unique'   => 'La direccion de Email ya esta siendo utilizada'
        ];
    }
}
