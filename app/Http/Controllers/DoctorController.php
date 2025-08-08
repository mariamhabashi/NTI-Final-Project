<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DoctorController extends Controller
{
    //
    public function create()
    {
        return view('doctors.create');
    }

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
        $Doctors=Doctor::all();

        return view('doctors.specialist',compact('Doctors'));
    }
    public function showSingleDr($id){
        $doctor=Doctor::find($id);
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
