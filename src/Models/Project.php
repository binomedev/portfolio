<?php


namespace Binomedev\Portfolio\Models;

use Binomedev\Portfolio\Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasSlug;
    use HasFactory;

    protected $table = 'portfolio_projects';

    protected static function newFactory()
    {
        return new ProjectFactory();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTagsListAttribute()
    {
        return collect(
            explode(',', $this->tags)
        )->map(function ($tag) {
            return trim($tag);
        });
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumb')->singleFile();
        $this->addMediaCollection('gallery');
        $this->addMediaCollection('banner')->singleFile();
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
