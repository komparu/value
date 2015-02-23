<?php

use Komparu\Value\ValueFactory;
use Komparu\Value\Partial;
use Komparu\Value\Range;
use Komparu\Value\Operator;

class ValueFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideOperator
     * @param $expectedClass
     * @param $expectedConversion
     * @param $expectedOperator
     */
    public function testStringToOperator($value, $expectedClass, $expectedConversion, $expectedOperator)
    {
        $value = ValueFactory::fromString($value);
        $this->assertInstanceOf($expectedClass, $value);
        $this->assertSame($expectedConversion, $value->value());
        $this->assertSame($expectedOperator, $value->operator());
    }

    /**
     * @dataProvider provideRange
     * @param $expectedClass
     * @param $expectedConversion
     */
    public function testStringToRange($value, $expectedClass, $min, $max)
    {
        $value = ValueFactory::fromString($value);
        $this->assertInstanceOf($expectedClass, $value);
        $this->assertSame($min, $value->min());
        $this->assertSame($max, $value->max());
    }

    /**
     * @dataProvider providePartial
     * @param $expectedClass
     * @param $expectedConversion
     */
    public function testStringToPartial($value, $expectedClass, $expectedConversion, $left, $right)
    {
        $value = ValueFactory::fromString($value);
        $this->assertInstanceOf($expectedClass, $value);
        $this->assertSame($expectedConversion, $value->value());
        $this->assertSame($left, $value->left());
        $this->assertSame($right, $value->right());
    }

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

    public function provideOperator()
    {
        return [
            ['test', Operator::class, 'test', '='],
            ['20', Operator::class, 20, '='],
            ['20.3', Operator::class, 20.3, '='],
            ['>20', Operator::class, 20, '>'],
            ['>=20', Operator::class, 20, '>='],
            ['<20', Operator::class, 20, '<'],
            ['<=20', Operator::class, 20, '<='],
        ];
    }

    public function provideRange()
    {
        return [
            ['20~40', Range::class, 20, 40],
        ];
    }

    public function providePartial()
    {
        return [
            ['~zzz~', Partial::class, 'zzz', true, true],
            ['zzz~', Partial::class, 'zzz',  false, true],
            ['~zzz', Partial::class, 'zzz', true, false],
        ];
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
            ['123.45', 'decimal', '123.45'],
            ['123.45', 'float', 123.45],
            ['{"foo":"bar"}', 'array', ['foo' => 'bar']],
        ];
    }
}