<?php

use PHPUnit\Framework\TestCase;

/**
 * MailerTest
 * @group group
 */
class MailerTest extends TestCase
{
    /** @test */
    public function test_function()
    {
        // Test
        $mailer = $this->createMock(Mailer::class);
        $mailer->method('sendMessage')->willReturn(true);

        $result = $mailer->sendMessage('sisko@ds9.fed', 'Hailing frequencies open');

        var_dump($result);
    }

}
