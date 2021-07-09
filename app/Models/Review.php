<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function opras()
    {
        return $this->belongsTo(Opras::class);
    }

    public function scopeMyReviews($query)
    {
        return $query->whereHas('opras.personalInformation', function (Builder $query)
        {
            $query->where('supervisor_id', auth()->id());
        });
    }
}
