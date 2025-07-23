<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Authors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'date_of_birth',
        'country_id',
        'web_url',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    // author hanya memiliki 1 negara
    public function countries(): BelongsTo
    {
        return $this->belongsTo(Countries::class);
    }

    // author memiliki banyak buku
    public function books(): HasMany
    {
        return $this->hasMany(Books::class);
    }
}
