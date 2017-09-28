<?php

namespace Illuminate\Romans\Providers;

use Illuminate\Support\ServiceProvider;
use Romans\Grammar\Grammar;
use Romans\Lexer\Lexer;
use Romans\Parser\Parser;

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
            Lexer::class,
            Parser::class,
        ];
    }

    /**
     * Register Romans Services
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Grammar::class);

        $this->app->bind(Lexer::class);

        $this->app->bind(Parser::class);
    }
}
