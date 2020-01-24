<?php

use PHPUnit\Framework\TestCase;

/**
 * UserTest
 * @group group
 */
class UserTest extends TestCase
{
    public $user;

    public function setUp(): void
    {
        $this->user = new User();
    }

    public static function setUpBeforeClass(): void{}
    
    
    /** @test */
    public function ReturnsFullName()
    {
        $this->user->first_name = 'Benjamin';
        $this->user->surname = 'Sisko';

        $this->assertEquals($this->user->getFullName(), 'Benjamin Sisko');
    }

    /** @test */
    public function FullnameEmptyByDefault()
    {
        $this->assertEmpty($this->user->getFullName());
        $this->assertEquals('', $this->user->getFullName());
    }

    
    /** @test */
    public function EmailNotification()
    {
        $mailerMock = $this->createMock(Mailer::class);
        $mailerMock->expects($this->once())
                    ->method('sendMessage')
                    ->with('picard@enterprise.fed', 'Beam me up!')
                    ->willReturn(true);
        // Test
        $this->user->email = 'picard@enterprise.fed';
        $this->user->setMailer($mailerMock);

        $this->assertTrue($this->user->notify('Beam me up!'));
    }

    /** @test */
    public function EmptyEmailAddress()
    {
        // Test
        // $this->user->email = 'sevenOfNine@voyager.deltaQuad';
        $this->user->email = '';
        $mailer = $this->getMockBuilder(Mailer::class)->setMethods()->getMock();

        $this->user->setMailer($mailer);
        
        $this->expectException(Exception::class);
        $this->assertNotEmpty($this->user->notify('Resistance is futile'));
    }
    
    

}
