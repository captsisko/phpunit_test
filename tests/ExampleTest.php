<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class ExampleTest extends MockeryTestCase
{
    public function testAdding2And2()
    {
        $this->assertEquals(4, 2 + 2);
    }
    
}