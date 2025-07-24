<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// impor Authenticatable dari Laravel's Auth User base class
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Bookstore_users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'code_user',
        'phone',
        'country_id',
        'place_of_birth',
        'date_of_birth',
        'age',
        'address',
        'photo',
        'can_buy',
        'can_rent',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'password' => 'hashed',
        'can_buy' => 'boolean', // Penting untuk memastikan tipe boolean
        'can_rent' => 'boolean', // Penting untuk memastikan tipe boolean
    ];

    // Relasi: User milik satu Country
    public function countries(): BelongsTo
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    // Relasi: User memiliki banyak Purchases
    public function purchases(): HasMany
    {
        return $this->hasMany(Purchases::class, 'user_id'); // Pastikan FK sesuai
    }

    // Relasi: User memiliki banyak RentalOrders
    public function rentalOrders(): HasMany
    {
        return $this->hasMany(rental_orders::class, 'user_id'); // Pastikan FK sesuai
    }
}
