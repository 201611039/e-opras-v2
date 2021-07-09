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

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function personalInformation()
    {
        return $this->hasOne(PersonalInformation::class);
    }

    public function performanceAgreement()
    {
        return $this->hasMany(PerformanceAgreement::class);
    }

    public function midYearReview()
    {
        return $this->hasMany(MidYearReview::class);
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
        return $this->review->where('section', 'performance_agreement')->last();
    }

    public function reviewSectionThree()
    {
        return $this->review->where('section', 'mid_year_review')->last();
    }

    public function reviewSectionFour()
    {
        return $this->review->where('section', 'revised_objective')->last();
    }

    public function reviewSectionFive()
    {
        return $this->review->where('section', 'annual_performance_review')->last();
    }

    public function reviewSectionSix()
    {
        return $this->review->where('section', 'attribute_good_performance')->last();
    }

    public function reviewSectionSeven()
    {
        return $this->review->where('section', 'overall_performance')->last();
    }

    public function reviewSectionEight()
    {
        return $this->review->where('section', 'reward_measure_sanction')->last();
    }

    public function reviewSectionNine()
    {
        return $this->review->where('section', 'attachment')->last();
    }

    // return true if section two status is complete or u
    public function checkSectionTwo()
    {
        return (!$this->sectionTwo()->status) && (!$this->reviewSectionTwo()) ||
        ($this->sectionTwo()->status) && ($this->reviewSectionTwo())
        ;
    }

    // return true if section two status is complete or u
    public function checkSectionThree()
    {
        return (!$this->sectionThree()->status) && (!$this->reviewSectionThree()) ||
        ($this->sectionThree()->status) && ($this->reviewSectionThree())
        ;
    }

}
