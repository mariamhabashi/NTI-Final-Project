<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppointmentSlot;
use Carbon\Carbon;

class AppointmentSlotSeeder extends Seeder
{
    public function run(): void
    {
        $doctorId = 1; // Example doctor
        $clinicId = 1; // Example clinic


        // Generate 5 days of slots, 9AM - 12PM, 30 mins each
        for ($day = 0; $day < 7; $day++) {
            $date = Carbon::now()->addDays($day)->toDateString();

            for ($hour = 6; $hour < 12; $hour++) {
                foreach ([0, 30] as $minute) {
                    AppointmentSlot::create([
                        'doctor_id' => $doctorId,
                        'clinic_id' => $clinicId,
                        'appointment_date' => $date,
                        'start_time' => Carbon::createFromTime($hour, $minute)->format('H:i'),
                        'end_time' => Carbon::createFromTime($hour, $minute + 30)->format('H:i'),
                        'is_booked' => false,
                    ]);
                }
            }
        }
        $clinicId = 2;
        for ($day = 0; $day < 5; $day++) {
            $date = Carbon::now()->addDays($day)->toDateString();

            for ($hour = 6; $hour < 12; $hour++) {
                foreach ([0, 30] as $minute) {
                    AppointmentSlot::create([
                        'doctor_id' => $doctorId,
                        'clinic_id' => $clinicId,
                        'appointment_date' => $date,
                        'start_time' => Carbon::createFromTime($hour, $minute)->format('H:i'),
                        'end_time' => Carbon::createFromTime($hour, $minute + 30)->format('H:i'),
                        'is_booked' => false,
                    ]);
                }
            }
        }
    }
}
