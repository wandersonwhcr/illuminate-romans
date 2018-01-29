<?php

namespace IlluminateTest\Romans\Providers;

use Illuminate\Romans\Providers\RomansProvider;
use Illuminate\Support\ServiceProvider;
use IlluminateTest\Romans\Foundation\Application;
use PHPUnit\Framework\TestCase;
use Romans\Filter\IntToRoman as IntToRomanFilter;
use Romans\Filter\RomanToInt as RomanToIntFilter;
use Romans\Grammar\Grammar;
use Romans\Lexer\Lexer;
use Romans\Parser\Parser;

class RomansProviderTest extends TestCase
{
    protected function setUp()
    {
        $this->application = $this->getMockForAbstractClass(Application::class);
        $this->provider    = new RomansProvider($this->application);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(ServiceProvider::class, $this->provider);
    }

    public function testDeferred()
    {
        $this->assertTrue($this->provider->isDeferred());
    }

    public function testProvides()
    {
        $provides = $this->provider->provides();

        $this->assertContains(Grammar::class, $provides);
        $this->assertContains(Lexer::class, $provides);
        $this->assertContains(Parser::class, $provides);
        $this->assertContains(IntToRomanFilter::class, $provides);
        $this->assertContains(RomanToIntFilter::class, $provides);
    }

    public function testBind()
    {
        $this->provider->register();

        $this->assertTrue($this->application->bound(Grammar::class));
        $this->assertTrue($this->application->bound(Lexer::class));
        $this->assertTrue($this->application->bound(Parser::class));
        $this->assertTrue($this->application->bound(IntToRomanFilter::class));
        $this->assertTrue($this->application->bound(RomanToIntFilter::class));
    }

    public function testGrammar()
    {
        $this->provider->register();

        $grammar = $this->application->make(Grammar::class);

        $this->assertInstanceOf(Grammar::class, $grammar);
        $this->assertSame($grammar, $this->application->make(Grammar::class));
    }

    public function testLexer()
    {
        $this->provider->register();

        $grammar = $this->application->make(Grammar::class);
        $lexer   = $this->application->make(Lexer::class);

        $this->assertInstanceOf(Lexer::class, $lexer);
        $this->assertSame($lexer, $this->application->make(Lexer::class));
        $this->assertSame($grammar, $lexer->getGrammar());
    }

    public function testParser()
    {
        $this->provider->register();

        $grammar = $this->application->make(Grammar::class);
        $parser  = $this->application->make(Parser::class);

        $this->assertInstanceOf(Parser::class, $parser);
        $this->assertSame($parser, $this->application->make(Parser::class));
        $this->assertSame($grammar, $parser->getGrammar());
    }

    public function testIntToRomanFilter()
    {
        $this->provider->register();

        $filter  = $this->application->make(IntToRomanFilter::class);
        $grammar = $this->application->make(Grammar::class);

        $this->assertInstanceOf(IntToRomanFilter::class, $filter);
        $this->assertSame($filter, $this->application->make(IntToRomanFilter::class));
        $this->assertSame($grammar, $filter->getGrammar());
    }

    public function testRomanToIntFilter()
    {
        $this->provider->register();

        $filter = $this->application->make(RomanToIntFilter::class);
        $lexer  = $this->application->make(Lexer::class);
        $parser = $this->application->make(Parser::class);

        $this->assertInstanceOf(RomanToIntFilter::class, $filter);
        $this->assertSame($filter, $this->application->make(RomanToIntFilter::class));
        $this->assertSame($lexer, $filter->getLexer());
        $this->assertSame($parser, $filter->getParser());
    }

    public function testAliases()
    {
        $this->provider->register();

        $this->assertTrue($this->application->bound('intToRoman'));
        $this->assertTrue($this->application->bound('romanToInt'));

        $this->assertSame($this->application->make(IntToRomanFilter::class), $this->application->make('intToRoman'));
        $this->assertSame($this->application->make(RomanToIntFilter::class), $this->application->make('romanToInt'));
    }
}
