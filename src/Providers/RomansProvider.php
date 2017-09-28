<?php

namespace Illuminate\Romans\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Romans Provider
 */
class RomansProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    protected $defer = true;
}
