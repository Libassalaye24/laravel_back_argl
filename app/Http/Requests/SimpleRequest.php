<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimpleRequest extends FormRequest
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
            //
            "libelle" => "required|unique:cycles",
        ];
    }
    public function messages()
    {
        return [

            "libelle.required" => "Le champs libelle est obligatoire",
            "libelle.unique" => "Le champs libelle doit etre unique",
        ];
    }
}
