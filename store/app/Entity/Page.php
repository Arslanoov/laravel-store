<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Page extends Model
{
    use NodeTrait;

    protected $table = 'pages';
    protected $fillable = [
        'title', 'slug', 'menu_title', 'parent_id',
        'description', 'content'
    ];

    public static function new(
        $title, $slug,
        $menuTitle, $parentId,
        $description, $content
    ): self
    {
        return static::create([
            'title' => $title,
            'slug' => $slug,
            'menu_title' => $menuTitle,
            'parent_id' => $parentId,
            'description' => $description,
            'content' => $content,
        ]);
    }

    public function getPath(): string
    {
        return implode('/', array_merge($this->ancestors()->defaultOrder()->pluck('slug')->toArray(), [$this->slug]));
    }

    public function getMenuTitle(): string
    {
        return $this->menu_title ?: $this->title;
    }
}