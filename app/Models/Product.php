<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Product extends Model
{

    protected $fillable = [
        'name',
        'sub_category',
        'availability',
        'category_id',
        'classification',
        'colours',
        'price',
        'sizes',
        'description',
        'image1',
        'image2',
        'image3',
        'image4',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                ->orWhere('sub_category', 'like', '%' . $filters['search'] . '%')
                ->orWhereHas('category', function ($query) use ($filters) {
                    $query->where('name', 'like', '%' . $filters['search'] . '%');
                });
        }

        if($filters['category'] ?? false) {
            $query->where('category_id', $filters['category']);
        }

        if($filters['sub'] ?? false) {
            $query->where('category_id', $filters['category'])
                ->where('sub_category', $filters['sub']);
        }

        if($filters['class'] ?? false) {
            $query->where('category_id', $filters['category'])
                ->where('sub_category', $filters['sub'])
                ->where('classification', $filters['class']);
        }
    }
}
