<?php

namespace Database\Seeders;
use App\Models\Doctor;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //
      $doctors=[
        [
            'first_name'=>'Mohammed',
            'last_name'=>'Ahmed',
            'profile_pic'=>'',
            'specialty'=>'Dentist',
            'overall_rating'=>'5',
            'doctor_rating'=>'5',
            'assistant_rating'=>'5',
            'clinic_rating'=>'5',
            'number_of_visitors'=>'15',
            'accept_promo_code'=>true,
            'about'=>'Dentist .....',
            'fee'=>'300',
            'waiting_time'=>'10 mins',
            'city'=>'cairo',
            'phone'=>'022',
            'experience_years'=>'3',
        ],
    ];

    foreach($doctors as $dr ){
        Doctor::create($dr);
    }
        // $this->call(DoctorSeeder::class);

    }
}
