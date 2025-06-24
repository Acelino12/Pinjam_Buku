<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bookstore_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gander',
        'phone',
        'country_id',
        'place_of_birth',
        'date_of_birth',
        'age',
        'address',
        'photo',
        'can_buy',
        'can_rent'
    ];

    protected $hidden =[
        'password',
        'remember_token'
    ];

    protected $casts =[
        'date_of_birth' => 'date'
    ];

     // Relasi: User milik satu Country
    public function countries(): BelongsTo
    {
        return $this->belongsTo(Countries::class);
    }

    // Relasi: User memiliki banyak Purchases
    // public function purchases(): HasMany
    // {
    //     return $this->hasMany(Purchase::class, 'user_id'); // Pastikan FK sesuai
    // }

    // Relasi: User memiliki banyak RentalOrders
    // public function rentalOrders(): HasMany
    // {
    //     return $this->hasMany(RentalOrder::class, 'user_id'); // Pastikan FK sesuai
    // }

}
