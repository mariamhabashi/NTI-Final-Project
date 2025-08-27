<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\AppointmentSlot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DoctorController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'specialty' => 'required',
            'fee' => 'required|numeric',
            'city' => 'required',
            'phone' => 'nullable',
            'experience_years' => 'nullable|numeric',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('profile_pic')) {
            $data['profile_pic'] = $request->file('profile_pic')->store('img', 'public');
        }

        Doctor::create($data);
        return redirect()->route('doctors.index')->with('success', 'Doctor added!');
    }
    public function index(){
        $doctors=Doctor::all();

        // Fetch available slots for the next 7 days for each doctor
        $availableSlots = [];
        $futureDates = Carbon::today()->addDays(6)->toDateString(); // 7 days including today

        foreach ($doctors as $doctor) {
            // Get slots for this doctor that are unbooked and within the next 7 days
            $slots = AppointmentSlot::where('doctor_id', $doctor->id)
                ->where('is_booked', false)
                ->where('appointment_date', '>=', Carbon::today()->toDateString())
                ->where('appointment_date', '<=', $futureDates)
                ->orderBy('appointment_date')
                ->orderBy('start_time')
                ->get();

                // Group by date and take the first few slots (e.g., 3) for preview
            $grouped = $slots->groupBy('appointment_date')->map(function ($dateSlots) {
                        return $dateSlots->take(3);
            });

            $availableSlots[$doctor->id] = $grouped;
        }

        return view('doctors.index', compact('doctors', 'availableSlots'));

    }
    public function showSingleDr(Doctor $doctor){
        
        return view('doctors.show',compact('doctor'));

    }

    public function search(Request $request)
    {
        $query = Doctor::query();
        

        if ($request->has('name') && $request->name != '') {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'LIKE', '%' . $request->name . '%')
                  ->orWhere('last_name', 'LIKE', '%' . $request->name . '%');
            });
        }

        if ($request->has('specialty') && $request->specialty != '') {
            $query->where('specialty', $request->specialty);
        }

        if ($request->has('city') && $request->city != '') {
            $query->where('city', $request->city);
        }

        $doctors = $query->get();

        return view('doctors.search', compact('doctors'));
    }

}
