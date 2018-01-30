<?php

namespace Illuminate\Romans\Support\Facades;

use Illuminate\Support\Facades\Facade;
use Romans\Filter\RomanToInt as RomanToIntFilter;

/**
 * RomanToInt Filter Facade
 */
class RomanToInt extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return RomanToIntFilter::class;
    }
}
