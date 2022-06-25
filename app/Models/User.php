<?php

namespace App\Models;

use acidjazz\Humble\Traits\Humble;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use function Illuminate\Events\queueable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $email
 * @property string|null $name
 * @property string $role
 * @property string|null $avatar
 * @property string|null $stripe
 * @property bool $is_sub
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property-read int|null $addresses_count
 * @property-read \App\Models\Bartender|null $bartender
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 * @property-read int|null $events_count
 * @property-read bool $has_active_session
 * @property-read array $location
 * @property-read \acidjazz\Humble\Models\Session $session
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Provider[] $providers
 * @property-read int|null $providers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\acidjazz\Humble\Models\Session[] $sessions
 * @property-read int|null $sessions_count
 *
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsSub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStripe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, Humble, Billable;

    protected $guarded = [];

    protected $appends = [
        'first_name',
        'is_trial',
    ];

    protected $casts = [
        'is_sub' => 'boolean',
    ];

    public const ADMIN = 'admin';

    public const CUSTOMER = 'customer';

    public static array $roles = [self::ADMIN, self::CUSTOMER];

    public array $interfaces = [
        'location' => [
            'name' => 'SessionLocation',
        ],
        'session' => [
            'name' => 'Session',
        ],
        'sessions' => [
            'name' => 'Sessions',
        ],
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::updated(queueable(function ($customer) {
            if ($customer->hasStripeId()) {
                $customer->syncStripeCustomerDetails();
            }
        }));
    }

    /**
     * Return if user is in trial mode.
     *
     * @return Attribute<callable, null>
     */
    protected function isTrial(): Attribute
    {
        return Attribute::make(
            get: fn (): bool => now()->diffInDays($this->created_at) < 8,
        );
    }

    /**
     * Return first name of users full name
     *
     * @return Attribute<callable, null>
     */
    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn (): string => isset($this->name) ? explode(' ', $this->name)[0] : '',
        );
    }

    /**
     * Get all the addresses for the user.
     *
     * @return HasMany<Address>
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Get the Bartender model associated with the User
     *
     * @return HasOne<Bartender>
     */
    public function bartender(): ?HasOne
    {
        return $this->hasOne(Bartender::class);
    }

    /**
     * Get the events for the user model.
     *
     * @return HasMany<Event>
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Get the providers for the user model.
     *
     * @return HasMany<Provider>
     */
    public function providers(): HasMany
    {
        return $this->hasMany(Provider::class);
    }
}
