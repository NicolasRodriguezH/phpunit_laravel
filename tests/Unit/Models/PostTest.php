<?php

namespace Tests\Unit\Models;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function test_set_name_in_lowercase()
    {
        $post = New Post;
        $post->name = 'Proyecto Laravel PHP';

        $this->assertEquals('proyecto laravel php', $post->name);
    }

    public function test_get_slug()
    {
        $post = New Post;
        $post->name = 'Proyecto Laravel PHP';

        $this->assertEquals('proyecto-laravel-php', $post->slug);
    }

    public function test_get_href() {
        $post = new Post;
        $post->name = 'Proyecto en PHP';

        $this->assertEquals('blog/proyecto-en-php', $post->href());
    }
}
