<?php

use PHPUnit\Framework\TestCase;

/**
 * QueueTest
 * @group group
 */
class QueueTest extends TestCase
{
    public $queue;
    
    protected function setUp(): void
    {
        $this->queue = new Queue();
        // code
    }

    protected function tearDown(): void {}
    
    
    /** @test */
    public function NewQuesIsEmpty()
    {

        $this->assertEmpty($this->queue->getCount());
        $this->assertEquals(0, $this->queue->getCount());
    }

    /** @test */
    public function NewItemIsAdded()
    {
        $this->queue->push('sisko');

        $this->assertEquals(1, $this->queue->getCount());
    }

    /** @test */
    public function QueueIsEmpty()
    {
        $this->queue->push('Picard');
        $item = $this->queue->pop();

        $this->assertEmpty($this->queue->getCount());
        $this->assertEquals('Picard', $item);
    }
    
    /** @test */
    public function CheckingItemsAreRemovedFromFrontofQueue()
    {
        $this->queue->push('Riker');
        $this->queue->push('Data');

        $this->assertEquals('Riker', $this->queue->pop());
    }    

}
