<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatedMark extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function annualReview()
    {
        return $this->hasOne(AnnualReview::class, 'rated_mark_id');
    }
}
