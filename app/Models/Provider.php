<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo};

/**
 * App\Models\Provider
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $avatar
 * @property string $name
 * @property mixed $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereUserId($value)
 * @mixin \Eloquent
 */
class Provider extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static array $allowed = ['email', 'google'];

    protected $casts = [
        'payload' => AsArrayObject::class,
    ];

    protected $hidden = [
        'payload.token',
    ];

    /**
     * Get the user that owns the Event
     *
     * @return BelongsTo<User, Provider>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
