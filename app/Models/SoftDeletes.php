<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes as BaseSoftDeletes;

/**
 * @property Carbon|null $deleted_at
 */
trait SoftDeletes
{
    use BaseSoftDeletes;
}
