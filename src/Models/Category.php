<?php


namespace Binomedev\Portfolio\Models;

use Binomedev\Portfolio\Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;
    use HasFactory;

    protected $table = 'portfolio_categories';

    protected static function newFactory()
    {
        return new CategoryFactory();
    }

    public function scopeWhereNotRoot($query)
    {
        return $query->whereNotNull('parent_id');
    }

    public function scopeWhereRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
