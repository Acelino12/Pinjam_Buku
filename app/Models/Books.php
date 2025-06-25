<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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


    public function authors(): BelongsTo {
        return $this->belongsTo(Authors::class);
    }

    public function publisher(): BelongsTo{
        return $this->belongsTo(Publishers::class);
    }
}
