<?php

use PHPUnit\Framework\TestCase;

/**
 * OrderTest
 * @group group
 */
class OrderTest extends TestCase
{
    /** @test */
    public function orderIsProcessed()
    {
        // Test
        $gateway = $this->getMockBuilder('PaymentGateway')->setMethods(['charge'])->getMock();
        $gateway->expects($this->once())
                ->method('charge')
                ->with($this->equalTo(400))
                ->willReturn(true);

        $order = new Order($gateway);

        $order->amount = 400;

        $this->assertTrue($order->process());

    }

    /** @test */
    public function orderIsProcessed_UsingMockery()
    {
        // Test
        $gateway = Mockery::Mock('PaymentGateway');
        $gateway->shouldReceive('charge')
                ->once()
                ->with(400)
                ->andReturn(true);


        $order = new Order($gateway);

        $order->amount = 400;

        $this->assertTrue($order->process());
    }
    
    protected function tearDown(): void
    {
        Mockery::close();
    }
    

}
