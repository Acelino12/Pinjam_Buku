<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class rental_items extends Model
{
    protected $fillable = [
        'rental_order_id',
        'books_id',
        'returned_at',
        'total_late_fee',
        'status'
    ];

    protected $casts = [
        'returned_at' => 'date'
    ];

    //rental item hanya memiliki 1 rental order
    public function rental_orders():BelongsTo {
        return  $this->belongsTo(rental_orders::class);
    }

    // rental item hanya memiliki 1 buku
    public function books(): BelongsTo{
        return $this->belongsTo(Books::class);
    }
}
