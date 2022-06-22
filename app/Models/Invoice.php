<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const PENDING = 'pending';

    public const PAID = 'paid';

    public const CANCELLED = 'cancelled';

    public const REFUNDED = 'refunded';

    public const EXPIRED = 'expired';

    public static array $statuses = [
        self::PENDING,
        self::PAID,
        self::CANCELLED,
        self::REFUNDED,
        self::EXPIRED,
    ];

    /**
     * The event that the invoice is for.
     *
     * @return BelongsTo<Event, Invoice>
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * The bartender that the invoice is for.
     *
     * @return BelongsTo<Bartender, Invoice>
     */
    public function bartender(): BelongsTo
    {
        return $this->belongsTo(Bartender::class);
    }
}
