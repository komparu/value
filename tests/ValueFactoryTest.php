<?php

use Komparu\Value\ValueFactory;
use Komparu\Value\ValueInterface;

class ValueFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideTypecast
     * @param $raw
     * @param $type
     */
    public function testTypecast($raw, $type, $result)
    {
        $value = ValueFactory::typecast($raw, $type);
        $this->assertSame($result, $value);
    }

    public function provideTypecast()
    {
        return [
            ['test', 'bool', true],
            ['', 'bool', false],
            ['false', 'bool', false],
            ['true', 'bool', true],
            [1, 'bool', true],
            [0, 'bool', false],
            ['123', 'int', 123],
            ['123.4567', 'decimal', 123.46],
            ['123.4512', 'decimal', 123.45],
            ['123.4567', 'float', 123.4567],
            ['{"foo":"bar"}', 'array', ['foo' => 'bar']],


            ['∞', null, ValueInterface::INFINITE],
            ['-∞', null, -ValueInterface::INFINITE],
        ];
    }
}