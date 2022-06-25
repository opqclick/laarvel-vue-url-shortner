<?php

namespace App\Rules\Api;

use Ariaieboy\LaravelSafeBrowsing\Facades\LaravelSafeBrowsing;
use Illuminate\Contracts\Validation\Rule;

class SafeBrowse implements Rule
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
        //dd($value);
        $result = LaravelSafeBrowsing::isSafeUrl($value,true);

        return (bool) $result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The provided URL is not safe for browsing!!';
    }
}
