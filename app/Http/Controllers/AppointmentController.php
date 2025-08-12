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
        $appointments = Appointment::with('doctor')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('appointments.index', compact('appointments'));
    }

    public function showBookingForm($doctorId, $clinicId)
    {
        // Displays the booking form for a specific doctor and specific clinic for the next 3 days
        $doctor = Doctor::findOrFail($doctorId);

        // prepare 3 days (strings like "2025-08-12")
        $dates = collect(range(0, 2))
            ->map(fn($i) => Carbon::today()->addDays($i)->toDateString());

        // fetch only unbooked slots for these dates for this doctor
        $slots = AppointmentSlot::where('doctor_id', $doctor->id)
            ->where('clinic_id', $clinicId)
//            ->where('is_booked', false)
            ->whereIn('appointment_date', $dates->toArray())
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

//        dd($availableSlots->first());

        // pass everything to the view
//        return view('appointments.book', compact('doctor', 'dates', 'slots', 'clinicId'));
        return view('appointments.form', compact('doctor', 'dates', 'slots', 'clinicId'));

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
            'user_id' => '1',
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


    public function getSlotsByClinic(Request $request)
    {
        // Returns available slots for a specific clinic in JSON
        $doctorId = $request->doctor_id;
        $clinicId = $request->clinic_id;
        $dates = $request->dates; // array of dates strings (Y-m-d)

        $slots = AppointmentSlot::where('doctor_id', $doctorId)
            ->where('clinic_id', $clinicId)
            ->where('is_booked', false)
            ->whereIn('appointment_date', $dates)
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

        return response()->json($slots);
    }


}
