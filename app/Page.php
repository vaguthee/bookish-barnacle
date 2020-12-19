<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\PageLink;

class Page extends Model
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

    public function links()
    {
        return $this->hasMany(PageLink::class);
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

    public function createCard($request, $user, $featureImageUrl = null)
    {
        return $this->create([
            'feature_image_url' => ($featureImageUrl) ?? $request->feature_image_url,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'own_page_url' => $request->own_page_url,
            'tags' => $request->tags,
            'slug' => (string) Str::uuid(),
            'keywords' => $request->keywords,
            'body' => "",
            'published' => false,
            'profile_id' => $user->acting_profile_id,
        ]);
    }

    public function updateCard($request,  $featureImageUrl = null)
    {
        return $this->update([
            'feature_image_url' => ($featureImageUrl) ?? $request->feature_image_url,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'own_page_url' => $request->own_page_url,
            'tags' => $request->tags,
            // 'slug' => (string) Str::uuid(),
            // 'keywords' => $request->keywords,
            // 'body' => "",
            // 'published' => false,
            // 'profile_id' => $user->acting_profile_id,
        ]);
    }

    public function createFromTemplate($template, $user)
    {
        return $this->create([
            'title' => "From $template->title template",
            'slug' => (string) Str::uuid(),
            'tags' => $template->tags,
            'keywords' => $template->keywords,
            'excerpt' => $template->excerpt,
            'feature_image_url' => $template->feature_image_url,
            'body' => $template->body,
            'published' => false,
            'profile_id' => $user->acting_profile_id,
        ]);
    }

    public function createNew($user)
    {
        return $this->create([
            'title' => (string) Str::uuid(),
            'slug' => (string) Str::uuid(),
            'body' => 'write here....',
            'profile_id' => $user->acting_profile_id,
        ]);
    }

    public function updateMeta($request)
    {
        return $this->update([
            'slug' => ($request->slug) ? Str::slug($request->slug, '-') : Str::slug($request->title, '-'),
            'title' => $request->title,
            'tags' => $request->tags,
            'keywords' => $request->keywords,
            'excerpt' => $request->excerpt,
            'feature_image_url' => $request->feature_image_url,
            'as_template' => ($request->as_template) ? true : false,
            'own_page_url' => $request->own_page_url,
        ]);
    }


}
