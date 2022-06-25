<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\BartenderEvent
 *
 * @property int $bartender_id
 * @property int $event_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BartenderEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BartenderEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BartenderEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder|BartenderEvent whereBartenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BartenderEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BartenderEvent whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BartenderEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BartenderEvent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BartenderEvent extends Pivot
{
    //
}
