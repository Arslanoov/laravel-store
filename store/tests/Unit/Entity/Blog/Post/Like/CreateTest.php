<?php

namespace Tests\Unit\Entity\Blog\Post\Like;

use App\Entity\Blog\Post\Like;
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

        $like = Like::new(
            $user->id,
            $post->id
        );

        $this->assertEquals($user->id, $like->user_id);
        $this->assertEquals($post->id, $like->post_id);
    }
}