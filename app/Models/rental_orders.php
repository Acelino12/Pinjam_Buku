<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class rental_orders extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'code_rent',
        'rental_date',
        'due_at',
        'total_late_fee',
        'books_id',
        'returned_at',
        'late_fee_per_week',
        'status'
    ];

    protected $casts = [
        'borrowed' => 'date',
        'due_at' => 'date',
        'returned_at' => 'date'
    ];

    // rental order memiliki 1 user
    public function user():BelongsTo {
        return $this->belongsTo(Bookstore_users::class,'user_id');
    }

    public function books(): BelongsTo{
        return $this->belongsTo(Books::class,'books_id');
    }
}
