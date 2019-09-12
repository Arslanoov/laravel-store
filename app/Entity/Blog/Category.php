<?php

namespace App\Entity\Blog;

use App\Entity\Blog\Post\Post;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

    public $timestamps = false;

    protected $table = 'blog_categories';
    protected $fillable = [
        'parent_id', 'name', 'slug', 'title', 'description'
    ];

    public static function new(
        $parent, $name,
        $slug, $title,
        $description
    ): self
    {
        return static::create([
            'parent_id' => $parent,
            'name' => $name,
            'slug' => $slug,
            'title' => $title,
            'description' => $description
        ]);
    }

    public function getSeoTitle(): string
    {
        return $this->title ?? $this->name;
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}