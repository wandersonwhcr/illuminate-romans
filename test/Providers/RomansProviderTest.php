<?php

namespace IlluminateTest\Romans\Providers;

use Illuminate\Romans\Providers\RomansProvider;
use Illuminate\Support\ServiceProvider;
use IlluminateTest\Romans\Foundation\Application;
use PHPUnit\Framework\TestCase;
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
    }

    public function testBind()
    {
        $this->provider->register();

        $this->assertTrue($this->application->bound(Grammar::class));
    }
}
