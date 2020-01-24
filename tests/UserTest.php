<?php

use PHPUnit\Framework\TestCase;

/**
 * UserTest
 * @group group
 */
class UserTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        // require 'User.php';
    }
    
    /** @test */
    public function ReturnsFullName()
    {
        $user = new User();
        $user->first_name = 'Benjamin';
        $user->surname = 'Sisko';

        $this->assertEquals($user->getFullName(), 'Benjamin Sisko');
    }

    /** @test */
    public function FullnameEmptyByDefault()
    {
        $user = new User();

        $this->assertEmpty($user->getFullName());
        $this->assertEquals('', $user->getFullName());
    }


    

}
