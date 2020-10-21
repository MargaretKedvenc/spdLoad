<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property string $image
 *
 * @mixin Builder
 */
class Product extends Model
{
    use HasTimestamps, SoftDeletes;

    protected $guarded = [];

    public function wishedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wish_products');
    }
}
