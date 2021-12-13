<?php

namespace Test;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function testIsTrue()
    {
        $this->assertTrue(true);
    }
}
