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
            'points'=>'100',
        ],
        [
            'first_name'=>'Ali',
            'last_name'=>'Hassan',
            'profile_pic'=>'',
            'specialty'=>'Cardiology',
            'overall_rating'=>'4.5',
            'doctor_rating'=>'4.5',
            'assistant_rating'=>'4.5',
            'clinic_rating'=>'4.5',
            'number_of_visitors'=>'20',
            'accept_promo_code'=>true,
            'about'=>'Cardiology .....',
            'fee'=>'500',
            'waiting_time'=>'15 mins',
            'city'=>'Alexandria',
            'phone'=>'033',
            'experience_years'=>'5',
            'points'=>'200',
        ],
        [
            'first_name'=>'Sara',
            'last_name'=>'Youssef',
            'profile_pic'=>'',
            'specialty'=>'Dermatology',
            'overall_rating'=>'4.8',
            'doctor_rating'=>'4.8',
            'assistant_rating'=>'4.8',
            'clinic_rating'=>'4.8',
            'number_of_visitors'=>'25',
            'accept_promo_code'=>false,
            'about'=>'Dermatology .....',
            'fee'=>'400',
            'waiting_time'=>'20 mins',
            'city'=>'cairo',
            'phone'=>'044',
            'experience_years'=>'4',
            'points'=>'150',
        ],
        [
            'first_name'=>'Laila',
            'last_name'=>'Khaled',
            'profile_pic'=>'',
            'specialty'=>'Pediatrics',
            'overall_rating'=>'4.9',
            'doctor_rating'=>'4.9',
            'assistant_rating'=>'4.9',
            'clinic_rating'=>'4.9',
            'number_of_visitors'=>'30',
            'accept_promo_code'=>true,
            'about'=>'Pediatrics .....',
            'fee'=>'350',
            'waiting_time'=>'12 mins',
            'city'=>'Alexandria',
            'phone'=>'055',
            'experience_years'=>'6',
            'points'=>'250',
        ],
    ];

    foreach($doctors as $dr ){
        Doctor::create($dr);
    }
        // $this->call(DoctorSeeder::class);

    }
}
