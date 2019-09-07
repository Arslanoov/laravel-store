<?php

namespace Tests\Unit\Entity\Blog\Post\Comment;

use App\Entity\Blog\Comment;
use App\Entity\Blog\Post\Post;
use App\Entity\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate()
    {
        $user = factory(User::class)->make([
            'id' => 1,
            'status' => User::STATUS_ACTIVE,
            'verify_token' => null,
        ]);

        $post = Post::new(
            $user->id, null, 'Title',
            'Slug', 'Description', 'Content'
        );

        $comment = Comment::new(
            $user->id, $post->id,
            null, $text = 'Text'
        );

        $this->assertEquals($comment->author_id, $user->id);
        $this->assertEquals($comment->post_id, $post->id);
        $this->assertEmpty($comment->parent_id);
        $this->assertEquals($comment->text, $text);
    }
}