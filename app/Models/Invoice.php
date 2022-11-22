<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    public const STATUS_OPENED = 1;
    public const STATUS_PAID = 2;
    public const STATUS_WAITING = 4;
    public const STATUS_OVERDUE = 5;
    public const STATUS_CANCELED = 6;

    protected $fillable = [
        'customer_id',
        'description',
        'items',
        'amount',
        'status',
    ];

    protected $casts = [
        'items' => AsCollection::class,
    ];

    protected $appends = [
        'paid',
    ];

    /**
     * Get the customer that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function charge()
    {
        return $this->hasOne(Charge::class)
            ->orderBy('id', 'desc')
            ->whereIn('status', [
                Charge::STATUS_OPENED,
                Charge::STATUS_PAID,
                Charge::STATUS_WAITING,
            ])
            ->limit(1);
    }

    /**
     * Get all of the charges for the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function charges(): HasMany
    {
        return $this->hasMany(Charge::class);
    }

    public function getPaidAttribute(): null|bool
    {
        if (!$this->status) {
            return null;
        }

        return $this->status == Invoice::STATUS_PAID;
    }
}
