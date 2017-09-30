<?php

namespace IlluminateTest\Romans\Support\Facades;

use Illuminate\Romans\Support\Facades\RomanToInt as RomanToIntFacade;
use Illuminate\Support\Facades\Facade;
use IlluminateTest\Romans\Foundation\Application;
use PHPUnit\Framework\TestCase;
use Romans\Filter\RomanToInt as RomanToIntFilter;

class RomanToIntTest extends TestCase
{
    protected function setUp()
    {
        $this->application = $this->getMockForAbstractClass(Application::class);

        RomanToIntFacade::setFacadeApplication($this->application);
    }

    public function testFacade()
    {
        $element = RomanToIntFacade::getFacadeRoot();

        $this->assertInstanceOf(RomanToIntFilter::class, $element);
    }
}
