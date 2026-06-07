<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/Models/User.php';

class UserTest extends TestCase
{
    public function testUserModelExists()
    {
        $user = new User();

        $this->assertInstanceOf(
            User::class,
            $user
        );
    }

    public function testFindByEmailMethodExists()
    {
        $user = new User();

        $this->assertTrue(
            method_exists(
                $user,
                'findByEmail'
            )
        );
    }
}