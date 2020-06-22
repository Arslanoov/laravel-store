<?php

namespace App\Entity\Blog;

use App\Entity\Blog\Post\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    protected $table = 'blog_tags';
    protected $fillable = [
        'name', 'slug'
    ];

    public static function new(string $name, string $slug): self
    {
        return static::create([
            'name' => $name,
            'slug' => $slug
        ]);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'blog_tag_assignments');
    }
}