<?php

use PHPUnit\Framework\TestCase;


class FunctionsTest extends TestCase
{
    public function setUp(): void
    {
    }
    
    public function testAddReturns()
    {
        $this->assertEquals(8, add(3,5));
        $this->assertEquals(4, add(2,2));
    }
    
    /** @test */
    public function testAddDoesNotReturnIncorrectValue()
    {
        $this->assertNotEquals(5, add(4,3));
    }
    
    public static function setUpBeforeClass(): void
    {
        require 'functions.php';
        // code
    }
    
    
}