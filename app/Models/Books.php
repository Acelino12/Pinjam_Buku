<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'code_book',
        'publisher',
        'description',
        'is_saleable',
        'stock_for_sale',
        'sale_price',
        'is_rentable',
        'stock_for_rent',
        'book_cover',
        'pages'
    ];

    // buku hanya memiliki 1 author
    public function authors(): BelongsTo {
        return $this->belongsTo(Authors::class,'author_id','id');
    }

    // buku hanya memiliki 1 publiser
    public function publisher(): BelongsTo{
        return $this->belongsTo(Publishers::class,'publisher','id');
    }

    // buku hanya memiliki banyak rent item
    public function rental_order(): HasMany{
        return $this->hasMany(rental_orders::class,);
    }
}
