<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineEntry extends Model
{
    protected $fillable = [
        'type', 'title', 'institution', 'description', 'image_url',
        'period_start', 'period_end', 'is_current',
        'icon_emoji', 'badge_color', 'sort_order',
    ];

    protected $casts = [
        'is_current' => 'boolean',
    ];

    public function getPeriodAttribute(): string
    {
        return $this->period_end
            ? "{$this->period_start} – {$this->period_end}"
            : $this->period_start;
    }

    public function scopeByType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('period_start');
    }
}
