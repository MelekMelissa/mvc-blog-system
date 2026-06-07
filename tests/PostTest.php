<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/Models/Post.php';

class PostTest extends TestCase
{
    public function testPostModelExists()
    {
        $post = new Post();

        $this->assertInstanceOf(
            Post::class,
            $post
        );
    }

    public function testCountMethodExists()
    {
        $post = new Post();

        $this->assertTrue(
            method_exists(
                $post,
                'count'
            )
        );
    }
}