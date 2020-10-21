<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps as BaseHasTimestamps;

/**
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
trait HasTimestamps
{
    use BaseHasTimestamps;
}
