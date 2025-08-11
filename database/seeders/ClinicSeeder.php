<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clinic;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Clinic::create([
            'doctor_id'    => 1,
            'clinic_name'  => 'Downtown Medical Center',
            'clinic_city'  => 'Cairo',
            'clinic_address'=> '123 Nile Street',
            'clinic_phone' => '0123456789',
        ]);

        Clinic::create([
            'doctor_id'    => 1,
            'clinic_name'  => 'Giza Health Clinic',
            'clinic_city'  => 'Giza',
            'clinic_address'=> '456 Pyramid Road',
            'clinic_phone' => '0987654321',
        ]);

        Clinic::create([
            'doctor_id'    => 1,
            'clinic_name'  => 'Alex Health Clinic',
            'clinic_city'  => 'Alex',
            'clinic_address'=> 'Syria Road',
            'clinic_phone' => '0987654321',
        ]);


    }
}
