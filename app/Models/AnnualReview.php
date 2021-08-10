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

    /**
    * @method return true if aprraisee and supervisor mark rated is filled
    *
    **/
    public function agreedMarkFlag()
    {
        return ($this->ratedMark->appraisee??null) && ($this->ratedMark->supervisor??null);
    }

    /**
    * @method return true if all rated mark are filled
    *
    **/
    public function allMarkFlag()
    {
        return ($this->ratedMark->appraisee??null) && ($this->ratedMark->supervisor??null)&& ($this->ratedMark->agreed??null);
    }
}
