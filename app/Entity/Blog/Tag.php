<?php

namespace App\Entity\Blog;

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
}