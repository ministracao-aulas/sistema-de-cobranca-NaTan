<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
