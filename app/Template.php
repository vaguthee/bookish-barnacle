<?php

namespace App;

use App\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{

    protected $guarded = [];

    public function createFromPage(Page $page)
    {
        return $this->create([
            'title' => $page->title,
            'tags' => $page->tags,
            'keywords' => $page->keywords,
            'excerpt' => $page->excerpt,
            'page_id' => $page->page_id,
            'feature_image_url' => $page->feature_image_url,
            'body' => $page->body,
            'published' => false,
            'publish_date' => $page->publish_date,
            'profile_id' => $page->profile_id,
        ]);
    }

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

}
