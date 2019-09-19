<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;

    protected $table = 'regions';
    protected $fillable = [
        'parent_id', 'name'
    ];

    public static function new(
        $parentId, $name
    ): self
    {
        return static::create([
            'parent_id' => $parentId,
            'name' => $name
        ]);
    }

    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id', 'id');
    }
}