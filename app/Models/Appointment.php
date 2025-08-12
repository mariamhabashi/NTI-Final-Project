<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $fillable = [
        'user_id',
        'doctor_id',
        'appointment_slot_id',
        'appointment_date',
        'appointment_time',
    ];
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function doctor(): BelongsTo {
        return $this->belongsTo(Doctor::class);
    }

    public function slot()
    {
        return $this->belongsTo(AppointmentSlot::class, 'appointment_slot_id');
    }

}
