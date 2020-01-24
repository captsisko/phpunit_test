<?php

use PHPUnit\Framework\TestCase;

/**
 * QueueTest
 * @group group
 */
class QueueTest extends TestCase
{
    public static $queue;
    
    protected function setUp(): void
    {
        // $this->queue = new Queue();
        // code
        static::$queue->empty();
    }

    public static function setUpBeforeClass(): void
    {
        // code
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass(): void
    {
        // code
        static::$queue = null;
    }
    
    protected function tearDown(): void {}
    
    
    /** @test */
    public function NewQuesIsEmpty()
    {

        $this->assertEmpty(static::$queue->getCount());
        $this->assertEquals(0, static::$queue->getCount());
    }

    /** @test */
    public function NewItemIsAdded()
    {
        static::$queue->push('sisko');

        $this->assertEquals(1, static::$queue->getCount());
    }

    /** @test */
    public function QueueIsEmpty()
    {
        static::$queue->push('Picard');
        $item = static::$queue->pop();

        $this->assertEmpty(static::$queue->getCount());
        $this->assertEquals('Picard', $item);
    }
    
    /** @test */
    public function CheckingItemsAreRemovedFromFrontofQueue()
    {
        static::$queue->push('Riker');
        static::$queue->push('Data');

        $this->assertEquals('Riker', static::$queue->pop());
    }
    
    

}
