<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "nom" => "required",
            "prenom" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6|max:10|confirmed",
            //password_confirmation
        ];
    }

    public function messages()
    {
        return [
            "nom.required" => "Le champs nom est obligatoire",
            "prenom.required" => "Le champs prenom est obligatoire",
            "email.required" => "Le champs email est obligatoire",
            "email.unique" => "Le champs email existe deja",
            "email.min" => "Le champs email doit avoir au minimum :min carateres",
            "email.max" => "Le champs email ne doit pas depasser :max carateres",
            "password.confirmed" => "Les deux mots ne correspondent pas",
        ];
    }

}
