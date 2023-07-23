<?php

namespace App\Http\Requests;

use App\Rules\CheckSchoolYearFormat;
use App\Rules\ValidateSchoolYear;
use Illuminate\Foundation\Http\FormRequest;

class AnneeScolaireRequest extends FormRequest
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
            "libelle" => ['required', 'string', 'unique:annee_scolaires' , new CheckSchoolYearFormat , new ValidateSchoolYear],

        ];
    }

    public function messages()
    {
        return [

            "libelle.required" => "Le champs libelle est obligatoire",
            "libelle.unique" => "Le champs libelle doit etre unique",
            "libelle.string" => "Le champs libelle doit etre une chaine",
        ];
    }
}
