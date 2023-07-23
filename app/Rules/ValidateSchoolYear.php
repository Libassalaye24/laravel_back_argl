<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateSchoolYear implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $year = explode('-', $value);
        $start = intval($year[0]);
        $end = intval($year[1]);
        if ($end  - $start !== 1) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "L'annee de fin doit etre superieur a l'annee de debut ";
    }
}
