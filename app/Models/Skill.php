<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name', 'category', 'level', 'level_percent',
        'icon_class', 'icon_url', 'color', 'sort_order', 'featured',
    ];

    protected $casts = [
        'featured'      => 'boolean',
        'level_percent' => 'integer',
    ];

    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function getLevelLabelAttribute(): string
    {
        return match($this->level) {
            'advanced'     => 'Advanced',
            'intermediate' => 'Intermediate',
            'beginner'     => 'Beginner',
            default        => ucfirst($this->level),
        };
    }
}
