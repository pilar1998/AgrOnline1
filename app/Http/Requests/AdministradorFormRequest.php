<?php

namespace AgrOnline\Http\Requests;

use AgrOnline\Http\Requests;

class AdministradorFormRequest extends Request
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
            'nombres_admin'=>'required|max:20',
            'apellidos_admin'=>'required|max:20'
        ];
    }
}
