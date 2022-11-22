<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Charge extends Model
{
    use HasFactory;

    public const STATUS_OPENED = 1;
    public const STATUS_PAID = 2;
    public const STATUS_WAITING = 4;
    public const STATUS_OVERDUE = 5;
    public const STATUS_CANCELED = 6;

    protected $fillable = [
        'invoice_id',
        'amount',
        'status',
    ];

    protected $appends = [
        'paid',
    ];

    /**
     * Get the invoice that owns the Charge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function getPaidAttribute()
    {
        return $this->status == Charge::STATUS_PAID;
    }
}
