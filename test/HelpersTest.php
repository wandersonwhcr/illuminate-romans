<?php

namespace IlluminateTest\Romans;

use Illuminate\Romans\Support\Facades\IntToRoman;
use Illuminate\Romans\Support\Facades\RomanToInt;
use IlluminateTest\Romans\Foundation\Application;
use PHPUnit\Framework\TestCase;
use Romans\Filter\IntToRoman as IntToRomanFilter;
use Romans\Filter\RomanToInt as RomanToIntFilter;

class HelpersTest extends TestCase
{
    protected function setUp()
    {
        $this->application = $this->getMockForAbstractClass(Application::class);

        IntToRoman::setFacadeApplication($this->application);
        RomanToInt::setFacadeApplication($this->application);

        $this->application->alias(IntToRomanFilter::class, 'intToRoman');
        $this->application->alias(RomanToIntFilter::class, 'romanToInt');
    }

    public function testIntToRoman()
    {
        $this->assertSame('MCMXCIX', int_to_roman(1999));
    }

    public function testRomanToInt()
    {
        $this->assertSame(1999, roman_to_int('MCMXCIX'));
    }
}
