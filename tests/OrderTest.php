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

}
