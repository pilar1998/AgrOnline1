<?php

namespace AgrOnline\Http\Requests;

use AgrOnline\Http\Requests;

class ProductosFormRequest extends Request
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
            'nombre_producto'=>'required|max:20|unique:producto,nombre_producto'
        ];
    }
}
