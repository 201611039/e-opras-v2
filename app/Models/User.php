<?php

namespace App\Models;

use App\Models\Year;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasSlug, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return $this->title . ' ' . $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('username')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeUsers($query)
    {
        return $query->where([['id', '!=', auth()->id()], ['id', '!=', '1']]);
    }

    public function getRoleAttribute()
    {
        return title_case(str_replace('-', ' ', $this->roles()->first()->name));
    }

    public function oprases()
    {
        return $this->hasMany(Opras::class);
    }

    public function myOpras(Year $year = null)
    {
        if (!$year) {
            $year = Year::active();
        }

        return $this->oprases->where('year_id', $year->id)->last();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
