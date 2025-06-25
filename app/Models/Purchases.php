<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchases extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code_putchase',
        'putchase_date',
        'total_amont',
        'status',
        'payment_status',
        'shipping_address'
    ];

    // purchase hanya dimiliki satu user
    public function users(): BelongsTo{
        return $this->belongsTo(Bookstore_users::class);
    }
}
