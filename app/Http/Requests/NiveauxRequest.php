<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NiveauxRequest extends FormRequest
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
            "libelle" => ['required' ,'string' , 'unique:niveaux'],
            "cycle_id" => ['required'  , 'exists:cycles,id'],
        ];
    }

    public function messages()
    {
        return [

            "libelle.required" => "Le champs libelle est obligatoire",
            "libelle.unique" => "Le champs libelle doit etre unique",
            "cycle_id.required" => "Le champs cycle_id est obligatoire",
            "cycle_id.exists" => "Le cycle id rensegne est invalide",
        ];
    }
}
