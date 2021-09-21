<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Review\RewardMeasure;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opras extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded = [];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->doNotGenerateSlugsOnCreate()
            ->doNotGenerateSlugsOnUpdate()
            ->saveSlugsTo('slug');
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function personalInformation()
    {
        return $this->hasOne(PersonalInformation::class);
    }

    public function performanceAgreements()
    {
        return $this->hasMany(PerformanceAgreement::class);
    }

    public function midYearReviews()
    {
        return $this->hasMany(MidYearReview::class);
    }

    public function revisedObjectives()
    {
        return $this->hasMany(RevisedObjective::class);
    }

    public function annualReviews()
    {
        return $this->hasMany(AnnualReview::class);
    }

    public function attributePerformance()
    {
        return $this->hasOne(attributePerformance::class);
    }

    public function overallPerformance()
    {
        return $this->hasOne(OverallPerformance::class);
    }

    public function rewardMeasure()
    {
        return $this->hasOne(RewardMeasureSanction::class, 'opras_id');
    }

    // Get previous model
    public  function previous(){
        return Opras::where([['id', '<', $this->id], ['user_id', Auth::id()]])->orderBy('id','desc')->first();
    }

    public function sectionOne()
    {
        return $this->sections->where('section', 'personal_information')->last();
    }

    public function sectionTwo()
    {
        return $this->sections->where('section', 'performance_agreement')->last();
    }

    public function sectionThree()
    {
        return $this->sections->where('section', 'mid_year_review')->last();
    }

    public function sectionFour()
    {
        return $this->sections->where('section', 'revised_objective')->last();
    }

    public function sectionFive()
    {
        return $this->sections->where('section', 'annual_performance_review')->last();
    }

    public function sectionSix()
    {
        return $this->sections->where('section', 'attribute_good_performance')->last();
    }

    public function sectionSeven()
    {
        return $this->sections->where('section', 'overall_performance')->last();
    }

    public function sectionEight()
    {
        return $this->sections->where('section', 'reward_measure_sanction')->last();
    }

    public function sectionNine()
    {
        return $this->sections->where('section', 'attachment')->last();
    }

    public function reviewSectionTwo()
    {
        return $this->reviews->where('section', 'performance_agreement')->last();
    }

    public function reviewSectionThree()
    {
        return $this->reviews->where('section', 'mid_year_review')->last();
    }

    public function reviewSectionFour()
    {
        return $this->reviews->where('section', 'revised_objective')->last();
    }

    public function reviewSectionFive()
    {
        return $this->reviews->where('section', 'annual_performance_review')->last();
    }

    public function reviewSectionSix()
    {
        return $this->reviews->where('section', 'attribute_good_performance')->last();
    }

    public function reviewSectionSeven()
    {
        return $this->reviews->where('section', 'overall_performance')->last();
    }

    public function reviewSectionEight()
    {
        return $this->reviews->where('section', 'reward_measure_sanction')->last();
    }

    public function reviewSectionNine()
    {
        return $this->reviews->where('section', 'attachment')->last();
    }

    // return true if section two status is complete or sent to supervisor
    public function checkSectionTwo()
    {
        if ($this->sectionTwo()) {
            return !($this->sectionTwo()->status) && !($this->reviewSectionTwo());
        } else {
            return false;
        }

        // return (!($this->sectionTwo()?($this->sectionTwo()->status):true)) && (!$this->reviewSectionTwo()) ||
        // (($this->sectionTwo()?($this->sectionTwo()->status):false)) && ($this->reviewSectionTwo())
        // ;
    }

    // return true if section two status is complete or sent to supervisor
    public function checkSectionThree()
    {
        if ($this->sectionThree()) {
            return !($this->sectionThree()->status) && !($this->reviewSectionThree());
        } else {
            return false;
        }

        // return (!($this->sectionThree()?($this->sectionThree()->status):true)) && (!$this->reviewSectionThree()) ||
        // (($this->sectionThree()?($this->sectionThree()->status):false)) && ($this->reviewSectionThree())
        // ;
    }

    // return true if section four status is complete or sent to supervisor
    public function checkSectionFour()
    {
        if ($this->sectionFour()) {
            return !($this->sectionFour()->status) && !($this->reviewSectionFour());
        } else {
            return false;
        }

        // return (!($this->sectionFour()?($this->sectionFour()->status):true)) && (!$this->reviewSectionFour()) ||
        // (($this->sectionFour()?($this->sectionFour()->status):false)) && ($this->reviewSectionFour())
        // ;
    }

    // return true if section five status is complete or sent to supervisor
    public function checkSectionFive()
    {
        if ($this->sectionFive()) {
            return !($this->sectionFive()->status) && !($this->reviewSectionFive());
        } else {
            return false;
        }

        // return (!($this->sectionFive()?($this->sectionFive()->status):true)) && (!$this->reviewSectionFive()) ||
        // (($this->sectionFive()?($this->sectionFive()->status):false)) && ($this->reviewSectionFive())
        // ;
    }

    // return true if section six status is complete or sent to supervisor
    public function checkSectionSix()
    {
        if ($this->sectionSix()) {
            return !($this->sectionSix()->status) && !($this->reviewSectionSix());
        } else {
            return false;
        }

        // return (!($this->sectionSix()?($this->sectionSix()->status):true)) && (!$this->reviewSectionSix()) ||
        // (($this->sectionSix()?($this->sectionSix()->status):false)) && ($this->reviewSectionSix())
        // ;
    }

    // return true if section seven status is complete or sent to supervisor
    public function checkSectionSeven()
    {
        if ($this->sectionSeven()) {
            return !($this->sectionSeven()->status) && !($this->reviewSectionSeven());
        } else {
            return false;
        }

        // return (!($this->sectionSeven()?($this->sectionSeven()->status):true)) && (!$this->reviewSectionSeven()) ||
        // (($this->sectionSeven()?($this->sectionSeven()->status):false)) && ($this->reviewSectionSeven())
        // ;
    }

    // return true if section eight status is complete or sent to supervisor
    public function checkSectionEight()
    {
        if ($this->sectionEight()) {
            return !($this->sectionEight()->status) && !($this->reviewSectionEight());
        } else {
            return false;
        }

        // return (!($this->sectionEight()?($this->sectionEight()->status):true)) && (!$this->reviewSectionEight()) ||
        // (($this->sectionEight()?($this->sectionEight()->status):false)) && ($this->reviewSectionEight())
        // ;
    }

}
