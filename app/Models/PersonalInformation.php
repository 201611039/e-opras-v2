<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
		'salary_scale'
	];

	protected $casts = [
        'first_appointment_present_post' => 'datetime',
    ];

    public function opras()
    {
        return $this->belongsTo(Opras::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }
}
