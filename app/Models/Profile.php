<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
		'date_of_birth'
	];

	protected $casts = [
        'date_of_birth' => 'datetime',
        'first_appointment' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
