<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentSlot extends Model
{
    //
    protected $fillable = [
        'doctor_id',
        'clinic_id',
        'appointment_date',
        'start_time',
        'end_time',
        'is_booked',
        'patient_id',
        'notes',
    ];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
