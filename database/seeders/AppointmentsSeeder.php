<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use App\Models\AppointmentSlot;
use Carbon\Carbon;

class AppointmentsSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $doctors = Doctor::all();
        $slots = AppointmentSlot::all();

        if ($users->isEmpty() || $doctors->isEmpty() || $slots->isEmpty()) {
            $this->command->warn('Make sure users, doctors, and slots are seeded first.');
            return;
        }
        foreach (range(1, 20) as $i) {
            $slot = $slots->random();

            Appointment::create([
                'user_id' => $users->random()->id,
                'doctor_id' => $slot->doctor_id,
                'appointment_slot_id' => $slot->id,
                'appointment_date' => $slot->date,
                'appointment_time' => $slot->time,
            ]);
        }
    }
}
