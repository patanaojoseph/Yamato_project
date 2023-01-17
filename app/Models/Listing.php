<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'beds', 'baths', 'kitchen', 'dinning', 'area', 'city', 'code', 'street', 'street_no', 'price'
    ];
}
