<?php

namespace AgrOnline\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeredaFormRequest extends FormRequest
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
            'nombre_vereda'=>'required|max:20'
        ];
    }
}
