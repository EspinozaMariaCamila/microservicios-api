<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'birth_date', 'is_premium'];

    protected $dates = ['birth_date', 'created_at', 'updated_at'];

    protected $casts = [
        'is_premium' => 'boolean',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
