<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', ['doctors' => Doctor::all()]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        Doctor::create($request->only(['first_name', 'last_name', 'specialty', 'city']));
        return redirect()->route('admin.doctors.index');
    }

    public function edit(Doctor $doctor)
    {
        return view('admin.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $doctor->update($request->only(['first_name', 'last_name', 'specialty', 'city']));
        return view('admin.doctors.index', ['doctors' => Doctor::all()]);
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctors.index');
    }
}

