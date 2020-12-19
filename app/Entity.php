<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $guarded = [];

        /**
     * Scope a query to only include published posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeNotHidden($query)
    {
        return $query->where('hidden_from_list', false);
    }

    /**
     * Scope a query to only include drafts (unpublished posts).
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDraft($query)
    {
        return $query->where('published', false);
    }

    public function getTagsArrayAttribute()
    {
        if ($this->tags) {
            return explode(',', $this->tags);
        }

        return [];
    }

    public function entitites()
    {
        return $this->hasMany(self::class);
    }
}
