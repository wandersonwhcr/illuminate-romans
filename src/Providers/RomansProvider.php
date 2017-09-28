<?php

namespace Illuminate\Romans\Providers;

use Illuminate\Support\ServiceProvider;
use Romans\Grammar\Grammar;

/**
 * Romans Provider
 */
class RomansProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    protected $defer = true;

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return [
            Grammar::class,
        ];
    }
}
