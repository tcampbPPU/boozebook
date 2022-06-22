<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Bartender
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 * @property-read int|null $events_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\BartenderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Bartender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bartender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bartender query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bartender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bartender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bartender whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bartender whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bartender whereUuid($value)
 * @mixin \Eloquent
 */
class Bartender extends Model
{
    use HasFactory;

    /**
     * Get the events that the bartender is assigned to.
     *
     * @return BelongsToMany<Event>
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'bartender_event')
            ->using(BartenderEvent::class)
            ->withTimestamps();
    }

    /**
     * Get all of the invoices for the Bartender
     *
     * @return HasMany<Invoice>
     */
    public function invoices(): ?HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Get the user that owns the Bartender
     *
     * @return BelongsTo<User, Bartender>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
