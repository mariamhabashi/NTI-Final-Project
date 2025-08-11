<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
//use Illuminate\View\View;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::with('doctor')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.book');
    }

    public function book(Request $request) {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|date_format:H:i',

        ]);
        $exists = Appointment::where('doctor_id', $request->doctor_id)
            ->where('date', $request->date)
            ->where('time', $request->time)
            ->exists();

        if ($exists) {
            return back()->with('error', 'This slot is already booked.');
        }

        Appointment::create([
            'doctor_id' => $request->doctor_id,
            'user_id' => auth()->id(),
            'appointment_date' => $request->date,
            'appointment_time' => $request->time,
        ]);

        return back()->with('success', 'Appointment booked successfully!');

    }

    public function showBookingForm($id)
    {
        $doctor = Doctor::findOrFail($id);

        if (!$doctor) {
            return redirect()->back()->with('error', 'Doctor not found.');
        }
        return view('appointments.book', compact('doctor'));
    }

}
