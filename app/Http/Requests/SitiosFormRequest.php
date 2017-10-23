<?php

namespace AgrOnline\Http\Requests;

use AgrOnline\Http\Requests;

class SitiosFormRequest extends Request
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
        	'nombre_finca'=>'required|max:20',
        	'id_vereda'=>'required|max:10',
            'id_admin'=>'required|max:10',
            'latitud'=>'required|max:10',
            'longitud'=>'required|max:10'
        ];
    }
}
