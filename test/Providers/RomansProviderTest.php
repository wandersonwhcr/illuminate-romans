<?php

namespace IlluminateTest\Romans\Providers;

use Illuminate\Romans\Providers\RomansProvider;
use Illuminate\Support\ServiceProvider;
use IlluminateTest\Romans\Foundation\Application;
use PHPUnit\Framework\TestCase;

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
}
