<?php

use Illuminate\Romans\Support\Facades\IntToRoman;
use Illuminate\Romans\Support\Facades\RomanToInt;

if (! function_exists('int_to_roman')) {
    /**
     * IntToRoman Filter Helper
     *
     * @param  mixed $value Integer
     * @return mixed Roman Number Result
     */
    function int_to_roman($value)
    {
        // IntToRoman Facade
        return IntToRoman::filter($value);
    }
}

if (! function_exists('roman_to_int')) {
    /**
     * RomanToInt Filter Helper
     *
     * @param  mixed $value Roman Number
     * @return mixed Integer
     */
    function roman_to_int($value)
    {
        // RomanToInt Facade
        return RomanToInt::filter($value);
    }
}
