<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase_items extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'book_id',
        'quantity'
    ];

    // purchase item hanya milik 1 buku
    public function books(): BelongsTo {
        return $this->belongsTo(Books::class);
    }

    // purchase item hanya milik satu purchase 
    public function purchase(): BelongsTo{
        return $this->belongsTo(Purchases::class) ;
    }
}
