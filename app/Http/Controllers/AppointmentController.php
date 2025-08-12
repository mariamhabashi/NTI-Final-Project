<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentSlot;
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

//    public function create()
//    {
//        return view('appointments.book');
//    }

//    public function book(Request $request) {
//        $request->validate([
//            'doctor_id' => 'required|exists:doctors,id',
//            'appointment_date' => 'required|date|after_or_equal:today',
//            'appointment_time' => 'required|date_format:H:i',
//
//        ]);
//        $exists = Appointment::where('doctor_id', $request->doctor_id)
//            ->where('date', $request->date)
//            ->where('time', $request->time)
//            ->exists();
//
//        if ($exists) {
//            return back()->with('error', 'This slot is already booked.');
//        }
//
//        Appointment::create([
//            'doctor_id' => $request->doctor_id,
//            'user_id' => auth()->id(),
//            'appointment_date' => $request->date,
//            'appointment_time' => $request->time,
//        ]);
//
//        return back()->with('success', 'Appointment booked successfully!');

//    }

//    public function showBookingForm($id)
//    {
//        $doctor = Doctor::findOrFail($id);
//        $days = collect(range(0, 2))->map(function ($i) use ($doctor) {
//            $date = Carbon::today()->addDays($i)->toDateString();
//
//            $availableSlots = AppointmentSlot::where('doctor_id', $doctor->id)
//                ->whereDate('appointment_date', $date)
//                ->where('is_booked', false)
//                ->orderBy('start_time')
//                ->get();
//
//            return [
//                'date'  => Carbon::today()->addDays($i),
//                'slots' => $availableSlots
//            ];
//        });
//
//
//        if (!$doctor) {
//            return redirect()->back()->with('error', 'Doctor not found.');
//        }
//        return view('appointments.book', compact('doctor','days'));
//    }

    public function showBookingForm($id)
    {
        $doctor = Doctor::findOrFail($id);

        // prepare 3 days (strings like "2025-08-12")
        $dates = collect(range(0, 2))
            ->map(fn($i) => Carbon::today()->addDays($i)->toDateString());

        // fetch only unbooked slots for these dates for this doctor
        $availableSlots = AppointmentSlot::where('doctor_id', $doctor->id)
            ->where('is_booked', false)
            ->whereIn('appointment_date', $dates->toArray())
            ->orderBy('appointment_date')
            ->orderBy('start_time')
            ->get();

//        dd($availableSlots->first());

        // pass everything to the view
        return view('appointments.book', compact('doctor', 'dates', 'availableSlots'));
    }


    public function book(Request $request)
    {
        $request->validate([
            'slot_id' => 'required|exists:appointment_slots,id',
        ]);

        $slot = AppointmentSlot::findOrFail($request->slot_id);

        if ($slot->is_booked) {
            return back()->with('error', 'This slot is already booked.');
        }

        // Create appointment record
        Appointment::create([
            'user_id'             => auth()->id(),
            'doctor_id'           => $slot->doctor_id,
            'appointment_date'    => $slot->appointment_date,
            'appointment_time'    => $slot->start_time,
            'appointment_slot_id' => $slot->id,
        ]);

        // Mark slot as booked
        $slot->update(['is_booked' => true]);

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment booked successfully!');
    }

    public function store(Request $request)
    {
        // validate input
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
        ]);

        // create appointment logic
        Appointment::create($validated);

        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }

    public function bookSlot(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'slot_id' => 'required|exists:appointment_slots,id',
        ]);

        $slot = AppointmentSlot::findOrFail($validated['slot_id']);

        if ($slot->is_booked) {
            return redirect()->back()->with('error', 'This slot is already booked.');
        }

        $slot->is_booked = true;
        $slot->save();

        return redirect()->back()->with('success', 'Slot booked successfully!');
    }


}
