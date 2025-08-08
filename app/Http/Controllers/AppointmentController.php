<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index() {
        $appointments = Appointment::with('doctor')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('appointments.index', compact('appointments'));
    }
}