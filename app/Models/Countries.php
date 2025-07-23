<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Countries extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users(): HasMany
    {
        return $this->hasMany(Bookstore_users::class);
    }

    public function countries(): HasMany
    {
        return $this->hasMany(Authors::class);
    }

    public function publisher(): HasMany
    {
        return $this->hasMany(Publishers::class);
    }
}
