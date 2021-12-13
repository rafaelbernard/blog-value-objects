<?php

namespace Test\App\Domain;

use App\Domain\Age;
use App\Domain\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    private const NAME = 'John Doe';
    private const AGE = 18;
gs
    public function testCanInstantiate()
    {
        $class = new Person(self::NAME, new Age(self::AGE));

        self::assertInstanceOf(Person::class, $class);
    }

    public function testCanReadProperties()
    {
        $person = new Person(self::NAME, new Age(self::AGE));

        self::assertEquals(self::NAME, $person->name());
        self::assertEquals(self::AGE, $person->age()->value());
    }
}
