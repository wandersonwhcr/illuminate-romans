<?php

namespace Illuminate\Romans\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Romans\Filter\IntToRoman as IntToRomanFilter;
use Romans\Filter\RomanToInt as RomanToIntFilter;
use Romans\Grammar\Grammar;
use Romans\Lexer\Lexer;
use Romans\Parser\Parser;

/**
 * Romans Provider
 */
class RomansProvider extends ServiceProvider implements DeferrableProvider
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
            IntToRomanFilter::class,
            RomanToIntFilter::class,
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

        $this->app->singleton(Lexer::class);

        $this->app->singleton(Parser::class);

        $this->app->singleton(IntToRomanFilter::class);

        $this->app->singleton(RomanToIntFilter::class);
        $this->app->resolving(RomanToIntFilter::class, function ($element, $app) {
            $element->setLexer($app->make(Lexer::class));
            $element->setParser($app->make(Parser::class));
            return $element;
        });

        $this->app->alias(IntToRomanFilter::class, 'intToRoman');
        $this->app->alias(RomanToIntFilter::class, 'romanToInt');
    }
}
