<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'horse',
        'share',
        'winner',
        'race_id'
    ];

    public function race()
    {
        return $this->belongsTo(Race::class);
    }
}
