<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property int $user_id
 * @property int $address_id
 * @property string $uuid
 * @property string $name
 * @property string|null $description
 * @property string $date
 * @property string $start_time
 * @property string $end_time
 * @property int $number_of_guests
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bartender[] $events
 * @property-read int|null $events_count
 * @property-read \App\Models\User $user
 *
 * @method static \Database\Factories\EventFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereNumberOfGuests($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUuid($value)
 * @mixin \Eloquent
 */
class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Bartenders that are assigned to the event.
     *
     * @return BelongsToMany<Bartender>
     */
    public function bartenders(): BelongsToMany
    {
        return $this->belongsToMany(Bartender::class, 'bartender_event')
            ->using(BartenderEvent::class)
            ->withTimestamps();
    }

    /**
     * Get the address of the event.
     *
     * @return BelongsTo<Address, Event>
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Get all of the invoices for the Event
     *
     * @return HasMany<Invoice>
     */
    public function invoices(): ?HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Get the user that owns the Event
     *
     * @return BelongsTo<User, Event>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
