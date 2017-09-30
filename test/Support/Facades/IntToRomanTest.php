<?php

namespace IlluminateTest\Romans\Support\Facades;

use Illuminate\Romans\Support\Facades\IntToRoman as IntToRomanFacade;
use Illuminate\Support\Facades\Facade;
use IlluminateTest\Romans\Foundation\Application;
use PHPUnit\Framework\TestCase;
use Romans\Filter\IntToRoman as IntToRomanFilter;

class IntToRomanTest extends TestCase
{
    protected function setUp()
    {
        $this->application = $this->getMockForAbstractClass(Application::class);

        IntToRomanFacade::setFacadeApplication($this->application);
    }

    public function testFacade()
    {
        $element = IntToRomanFacade::getFacadeRoot();

        $this->assertInstanceOf(IntToRomanFilter::class, $element);
    }
}
