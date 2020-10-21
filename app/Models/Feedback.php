<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $user_id
 * @property User $user
 * @property int $product_id
 * @property Product $product
 * @property string $comment
 * @property User[] $likes
 *
 * @mixin Builder
 */
class Feedback extends Model
{
    protected $table = 'feedbacks';

    use HasTimestamps, SoftDeletes;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'feedback_likes');
    }
}
