<?php

namespace App\Rules;

use App\Invite;
use Illuminate\Contracts\Validation\Rule;

class CodeNotUsed implements Rule
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
        $invite = Invite::where('code', $value)->firstOrFail();
        return !$invite->used;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The registration code is already used';
    }
}
