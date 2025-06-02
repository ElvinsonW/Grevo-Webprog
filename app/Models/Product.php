<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["name", "slug", "product_category_id", "weight", "material", "process", "certification", "description", "sold"];
    protected $with = ["product_category"];

    public function product_category(): BelongsTo {
        return $this->belongsTo(ProductCategory::class, "product_category_id");
    }

    public function product_images(): HasMany {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function product_variants(): HasMany {
        return $this->hasMany(ProductVariant::class, "product_id");
    }

    public function carts(): HasMany {
        return $this->hasMany(Cart::class, 'product_id');
    }

    public function scopeFilter(Builder $query, array $filter) {
        $query->when(
            $filter["search"] ?? false,
            fn($query, $search) => 
                $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            $filter["category"] ?? false,
            fn($query, $category) =>
                $query->whereHas(
                    'product_category',
                    fn($categoryQuery) =>
                        $categoryQuery->where('slug', $category)
                )
        );
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
