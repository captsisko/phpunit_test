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
    
    /** @test */
    public function Max_Additions_To_Queue()
    {
        $captains = ['Kirk', 'Spock', 'Picard', 'Sisko', 'Janeway'];

        for($i=0; $i < Queue::MAX_ITEMS; $i++){
            $this->queue->push($captains[$i]);
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    /** @test */
    public function Max_Additions_To_Queue_And_Then_Some()
    {
        $captains = ['Kirk', 'Spock', 'Picard', 'Sisko', 'Janeway', 'Worf'];

        for($i=0; $i < Queue::MAX_ITEMS; $i++){
            $this->queue->push($captains[$i]);
        }

        $this->expectException(QueueException::class);
        // $this->expectExceptionCode(ClassName::CONST);
        $this->expectExceptionMessage('QUEUE IS FULL!');

        $this->queue->push('Scottie');

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());

    }
    

}
