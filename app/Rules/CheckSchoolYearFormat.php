<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckSchoolYearFormat implements Rule
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
        $pattern = '/^\d{4}-\d{4}$/';

        return preg_match($pattern, $value);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Le format de l'année scolaire est invalide. Le format doit être AAAA-AAAA";
    }
}
