<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function wishedProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'wish_products');
    }

    public function likedFeedbacks(): BelongsToMany
    {
        return $this->belongsToMany(Feedback::class, 'feedback_likes');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
