<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardMeasureSanction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function opras()
    {
        return $this->belongsTo(Opras::class);
    }
}
