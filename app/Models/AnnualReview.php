<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualReview extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ratedMark()
    {
        return $this->belongsTo(RatedMark::class);
    }
}
