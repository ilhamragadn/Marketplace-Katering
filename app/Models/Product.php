<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'prod_title',
        'prod_description',
        'prod_image',
        'prod_price',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
