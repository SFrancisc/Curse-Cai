<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'date',
        'distance'
    ];

    public function details()
    {
        return $this->hasMany(Detail::class);
    }
}
