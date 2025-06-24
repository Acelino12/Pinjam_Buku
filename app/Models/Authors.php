<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    protected $casts =[
        'date_of_birth' => 'date'
    ];

    public function countries() : BelongsTo {
        return $this->belongsTo(Countries::class);
    }
}
