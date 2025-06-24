<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function countries(): BelongsTo {
        return $this->belongsTo(Countries::class);
    }
}
