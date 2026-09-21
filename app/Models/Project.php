<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'slug', 'title', 'description', 'category',
        'tech_stack', 'highlights', 'github_repo', 'demo_url',
        'thumb_icon', 'thumb_gradient', 'image_url', 'featured', 'status', 'sort_order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'highlights' => 'array',
        'featured'   => 'boolean',
    ];

    public function getGithubUrlAttribute(): ?string
    {
        return $this->github_repo
            ? "https://github.com/{$this->github_repo}"
            : null;
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }
}
