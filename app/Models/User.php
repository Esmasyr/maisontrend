<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'is_admin'          => 'boolean',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | İlişkiler
    |--------------------------------------------------------------------------
    */

    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    // Geriye dönük uyumluluk için alias
    public function cart()
    {
        return $this->cartItems();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Yardımcı Metodlar
    |--------------------------------------------------------------------------
    */

    public function hasFavorite($productId): bool
    {
        return $this->favorites()->where('product_id', $productId)->exists();
    }

    public function getCartItemsCount(): int
    {
        return $this->cartItems()->sum('quantity');
    }

    public function getCartTotal(): float
    {
        return $this->cartItems()->with('product')->get()->sum(
            fn($item) => $item->quantity * ($item->product->price ?? 0)
        );
    }

    public function getFavoritesCount(): int
    {
        return $this->favorites()->count();
    }

    public function getOrdersCount(): int
    {
        return $this->orders()->count();
    }

    public function isAdmin(): bool
    {
        return (bool) $this->is_admin;
    }
}