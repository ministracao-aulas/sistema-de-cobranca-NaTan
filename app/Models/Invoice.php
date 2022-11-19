<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function charge()
    {
        return $this->hasOne(Charge::class)->orderBy('id', 'desc')->whereIn('status', [
            Charge::STATUS_OPENED,
            Charge::STATUS_PAID,
            Charge::STATUS_WAITING,
        ]);
    }

    public function getPaidAttribute()
    {
        return $this->status == static::STATUS_PAID;
    }
}
