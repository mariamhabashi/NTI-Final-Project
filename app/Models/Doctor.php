<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    // use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'profile_pic',
        'specialty',
        'overall_rating',
        'doctor_rating',
        'assistant_rating',
        'clinic_rating',
        'number_of_visitors',
        'accept_promo_code',
        'about',
        'fee',
        'waiting_time',
        'city',
        'phone',
        'experience_years',
    ];
    

}
