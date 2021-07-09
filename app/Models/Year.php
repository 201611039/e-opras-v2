<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'start' => 'date',
        'end' => 'date'
    ];

    public function scopeActive($query)
    {
        return $query->get()->last();
    }
}
