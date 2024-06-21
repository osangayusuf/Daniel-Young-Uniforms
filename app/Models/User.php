<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company',
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'usertype'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function shippingAddress(): HasOne
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['user_search'] ?? false) {
            $query->where('firstname', 'like', '%' . $filters['user_search'] . '%')
                ->orWhere('lastname', 'like', '%' . $filters['user_search'] . '%')
                ->orWhere('email', 'like', '%' . $filters['user_search'] . '%')
                ->orWhere('phone', 'like', '%' . $filters['user_search'] . '%')
                ->orWhere('company', 'like', '%' . $filters['user_search'] . '%');
        }
    }
}
