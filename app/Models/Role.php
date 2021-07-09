<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Permission\Models\Role as Group;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Group
{
    use SoftDeletes, HasSlug;

    public function getFullNameAttribute()
    {
        return strtoupper(str_replace('-', ' ', $this->name));
    }

    public function scopeRoles($query)
    {
        return $query->where([['name', '!=', 'super-admin']])->get();
    }

     /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
