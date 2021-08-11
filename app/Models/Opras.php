<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
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
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
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
        return (!$this->sectionTwo()->status) && (!$this->reviewSectionTwo()) ||
        ($this->sectionTwo()->status) && ($this->reviewSectionTwo())
        ;
    }

    // return true if section two status is complete or sent to supervisor
    public function checkSectionThree()
    {
        return (!$this->sectionThree()->status) && (!$this->reviewSectionThree()) ||
        ($this->sectionThree()->status) && ($this->reviewSectionThree())
        ;
    }

    // return true if section four status is complete or sent to supervisor
    public function checkSectionFour()
    {
        return (!$this->sectionFour()->status) && (!$this->reviewSectionFour()) ||
        ($this->sectionFour()->status) && ($this->reviewSectionFour())
        ;
    }

    // return true if section five status is complete or sent to supervisor
    public function checkSectionFive()
    {
        return (!$this->sectionFive()->status) && (!$this->reviewSectionFive()) ||
        ($this->sectionFive()->status) && ($this->reviewSectionFive())
        ;
    }
    // return true if section six status is complete or sent to supervisor
    public function checkSectionSix()
    {
        return (!$this->sectionSix()->status) && (!$this->reviewSectionSix()) ||
        ($this->sectionSix()->status) && ($this->reviewSectionSix())
        ;
    }

}
