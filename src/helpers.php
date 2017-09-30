<?php

use Illuminate\Romans\Support\Facades\IntToRoman;

if (! function_exists('int_to_roman')) {
    /**
     * IntToRoman Filter Helper
     *
     * @param  mixed $value Integer
     * @return mixed Roman Number Result
     */
    function int_to_roman($value) {
        // IntToRoman Facade
        return IntToRoman::filter($value);
    }
}
