<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Publishers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'country_id',
        'phone',
        'email',
        'web_url'
    ];

    //publiser bisa memiliki 1 negara
    public function countries(): BelongsTo {
        return $this->belongsTo(Countries::class);
    }

    // publiser dapat memiliki banyak buku
    public function books(): HasMany{
        return $this->hasMany(Books::class);
    }
}
