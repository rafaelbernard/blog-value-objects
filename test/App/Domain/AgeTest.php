<?php

namespace Test\App\Domain;

use App\Domain\Age;
use PHPUnit\Framework\TestCase;

class AgeTest extends TestCase
{
    private const AGE = 30;

    public function testItCanBeInstantiated()
    {
        $class = new Age(self::AGE);

        self::assertInstanceOf(Age::class, $class);
    }

    public function testCanReadValue()
    {
        $class = new Age(self::AGE);

        self::assertEquals(self::AGE, $class->value());
    }

    public function testItThrowsExceptionForInvalidValue()
    {
        self::expectException(\UnexpectedValueException::class);

        new Age(-1);
    }
}
