<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use MongoDB\Driver\Query;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'shipping_address_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shippingAddress(): belongsTo
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['order_search'] ?? false) {
            $query->where('id', 'like', '%' . $filters['order_search'] . '%')
                ->orWhereHas('user', function ($query) use ($filters) {
                    $query->where('firstname', 'like', '%' . $filters['order_search'] . '%')
                    ->orWhere('lastname', 'like', '%' . $filters['order_search'] . '%')
                    ->orWhere('email', 'like', '%' . $filters['order_search'] . '%');
                });
        }
    }
}
