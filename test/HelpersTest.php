<?php

namespace IlluminateTest\Romans;

use Illuminate\Romans\Support\Facades\IntToRoman;
use IlluminateTest\Romans\Foundation\Application;
use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    protected function setUp()
    {
        $this->application = $this->getMockForAbstractClass(Application::class);

        IntToRoman::setFacadeApplication($this->application);
    }

    public function testIntToRoman()
    {
        $this->assertSame('MCMXCIX', int_to_roman(1999));
    }
}
