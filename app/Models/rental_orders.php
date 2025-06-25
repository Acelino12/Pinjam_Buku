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
        'borrowed',
        'due_at',
        'late_fee_per_week'
    ];

    protected $casts = [
        'borrowed' => 'date',
        'due_at' => 'date'
    ];

    // rental order memiliki 1 user
    public function users():BelongsTo {
        return $this->belongsTo(Bookstore_users::class);
    }

    //rental orders memiliki banyak rental items
    public function items(): HasMany{
        return $this->hasMany(rental_items::class);
    }
}
