<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentSlot;
use Illuminate\Support\Facades\Auth;
//use Illuminate\View\View;

class AppointmentController extends Controller
{
    // Shows the list of appointments for the logged-in user
    public function index() {
        $appointments = Appointment::with('user', 'doctor', 'slot')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('appointments.index', compact('appointments'));
    }

    public function showBookingForm($doctorId, $clinicId, $offset = 0)
    {
        // get doctor and clinic
        $doctor = Doctor::findOrFail($doctorId);
        $clinic = $doctor->clinics->firstWhere('id', $clinicId);
//        $clinic = Clinic::findOrFail($clinicId);

        // prepare 3 days
        $dates = collect(range(0, 2))
            ->map(fn($i) => Carbon::today()->addDays($offset + $i)->toDateString());

        // fetch slots only for those dates
        $slots = AppointmentSlot::where('doctor_id', $doctor->id)
            ->where('clinic_id', $clinic->id)
            ->whereIn('appointment_date', $dates->toArray())
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

//        dd($clinic);

//        return view('appointments.pplanb', compact('doctor', 'clinic', 'dates', 'slots', 'offset'));
        return view('appointments.form', compact('doctor', 'clinic', 'dates', 'slots', 'offset'));

    }

    public function confirmBooking($slotId)
    {
        // Loads a single slot to confirm booking
        $slot = AppointmentSlot::findOrFail($slotId);
        $doctor = Doctor::findOrFail($slot->doctor_id);
        $user = Auth::user();
        $clinic = Clinic::findOrFail($slot->clinic_id);
        return view('appointments.confirm', compact('slot','doctor', 'user', 'clinic'));
    }



    public function store(Request $request)
    {


        // books the appointment
        $request->validate([
            'slot_id' => 'required|exists:appointment_slots,id',
        ]);

        $slot = AppointmentSlot::findOrFail($request->slot_id);

        if ($slot->is_booked) {
            return back()->with('error', 'This slot is already booked.');
        }

        // Create appointment record
        Appointment::create([
            'user_id' => Auth::id(),
            'doctor_id' => $slot->doctor_id,
            'appointment_slot_id' => $slot->id,
            'appointment_date' => $slot->appointment_date,
            'appointment_time' => $slot->start_time,
        ]);

        // Mark slot as booked
        $slot->update(['is_booked' => true]);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment booked successfully!');
    }


    public function getSlots($doctorId, $clinicId)
    {
        $doctor = Doctor::with('clinics')->findOrFail($doctorId);
        $slots = AppointmentSlot::where('doctor_id', $doctorId)
            ->where('clinic_id', $clinicId)
            ->get();

        $dates = $slots->pluck('appointment_date')->unique();

//        return view('appointments.partials.slots', compact('dates', 'slots', 'clinicId'))->render();
    }



}
