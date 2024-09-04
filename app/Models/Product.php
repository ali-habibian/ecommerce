<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasPersianSlug, Searchable;

    /**
     * The attributes that should not be mass assignable
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Returns the slug options for the product model.
     *
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /*
 * Get the indexable data array for the model.
 *
 * @return array
 */
    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
        ];
    }

    /**
     * Scope a query to only include listings that are returned by scout
     *
     * @param Builder $query
     * @param string $search
     * @return Builder
     */
    public function scopeWhereScout(Builder $query, string $search): Builder
    {
        return $query->whereIn(
            'id',
            self::search($search)
                ->get()
                ->pluck('id'),
        );
    }

    /**
     * Get the category that own this product
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }
}
