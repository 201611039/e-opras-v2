<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributePerformance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function opras()
    {
        return $this->belongsTo(Opras::class);
    }

    public function interactionMark()
    {
        return $this->belongsTo(RatedMark::class, 'interaction', 'id');
    }

    public function respectMark()
    {
        return $this->belongsTo(RatedMark::class, 'respect', 'id');
    }

    public function writtingMark()
    {
        return $this->belongsTo(RatedMark::class, 'writting', 'id');
    }

    public function speakMark()
    {
        return $this->belongsTo(RatedMark::class, 'speak', 'id');
    }

    public function listenMark()
    {
        return $this->belongsTo(RatedMark::class, 'listen', 'id');
    }

    public function trainMark()
    {
        return $this->belongsTo(RatedMark::class, 'train', 'id');
    }

    public function planOrganizeMark()
    {
        return $this->belongsTo(RatedMark::class, 'plan_organize', 'id');
    }

    public function leadMark()
    {
        return $this->belongsTo(RatedMark::class, 'lead', 'id');
    }

    public function innitiateInnovateMark()
    {
        return $this->belongsTo(RatedMark::class, 'innitiate_innovate', 'id');
    }

    public function outputMark()
    {
        return $this->belongsTo(RatedMark::class, 'output', 'id');
    }

    public function persistenceMark()
    {
        return $this->belongsTo(RatedMark::class, 'persistence', 'id');
    }

    public function demandMark()
    {
        return $this->belongsTo(RatedMark::class, 'demand', 'id');
    }

    public function extraWorkMark()
    {
        return $this->belongsTo(RatedMark::class, 'extra_work', 'id');
    }

    public function responsibilityMark()
    {
        return $this->belongsTo(RatedMark::class, 'responsibility', 'id');
    }

    public function decisionsMark()
    {
        return $this->belongsTo(RatedMark::class, 'decisions', 'id');
    }

    public function customerMark()
    {
        return $this->belongsTo(RatedMark::class, 'customer', 'id');
    }

    public function followershipMark()
    {
        return $this->belongsTo(RatedMark::class, 'followership', 'id');
    }

    public function supportMark()
    {
        return $this->belongsTo(RatedMark::class, 'support', 'id');
    }

    public function instructionsMark()
    {
        return $this->belongsTo(RatedMark::class, 'instructions', 'id');
    }

    public function workingMark()
    {
        return $this->belongsTo(RatedMark::class, 'working', 'id');
    }

    public function servicesMark()
    {
        return $this->belongsTo(RatedMark::class, 'services', 'id');
    }

    public function governmentMark()
    {
        return $this->belongsTo(RatedMark::class, 'government', 'id');
    }

    public function teamWorkMark()
    {
        return $this->belongsTo(RatedMark::class, 'team_work', 'id');
    }

    public function appraiseeMarkFlag()
    {
        return $this->teamWorkMark->appraisee??false;
    }

    public function supervisorMarkFlag()
    {
        return (($this->teamWorkMark->appraisee)??false) && (($this->teamWorkMark->supervisor)??false);
    }

    public function agreedMarkFlag()
    {
        return (($this->teamWorkMark->appraisee)??false) && (($this->teamWorkMark->supervisor)??false) && (!$this->opras->reviewSectionSix());
    }

    public function allMarkFlag()
    {
        return (($this->teamWorkMark->appraisee)??false) && (($this->teamWorkMark->supervisor)??false) && (($this->teamWorkMark->agreed)??false);
    }
}
