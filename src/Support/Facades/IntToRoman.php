<?php

namespace Illuminate\Romans\Support\Facades;

use Illuminate\Support\Facades\Facade;
use Romans\Filter\IntToRoman as IntToRomanFilter;

/**
 * IntToRoman Filter Facade
 */
class IntToRoman extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'intToRoman';
    }
}
