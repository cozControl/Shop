<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'price',
        'description',
        'material',
        'image',
        'is_featured',
        'is_published',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'price' => 'integer',
    ];

    public function formattedPrice(): string
    {
        return number_format($this->price).' TZS';
    }

    /**
     * Seeded products reference legacy template images in public/assets/img.
     * Products created/edited through the Filament dashboard store their
     * upload under the public storage disk (storage/app/public/products).
     */
    public function getImageUrlAttribute(): string
    {
        if (! $this->image) {
            return asset('assets/img/feature_prod_01.jpg');
        }

        if (str_starts_with($this->image, 'products/')) {
            return asset('storage/'.$this->image);
        }

        return asset('assets/img/'.$this->image);
    }
}
