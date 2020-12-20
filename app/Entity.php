<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $guarded = [];
    protected $appends = array('truncated_summary','hours_array');

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

    public function getTruncatedSummaryAttribute()
    {
        return $this->limitText($this->summary, 20);
    }

    public function limitText($text, $limit)
    {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos   = array_keys($words);
            $text  = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }

    // public function gettingThere()
    // {
    //     return $this->hasMany(Transport::class, 'to_entity');
    // }

    public function getHoursArrayAttribute()
    {
        if ($this->hours) {
            return explode(',', $this->hours);
        }

        return [];
    }
}
