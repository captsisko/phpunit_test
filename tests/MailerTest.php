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
        $mailer = new Mailer();
        $result = $mailer->sendMessage('sisko@ds9.fed', 'Hailing frequencies open');

        var_dump($result);
    }

}
