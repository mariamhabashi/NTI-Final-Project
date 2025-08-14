<?php

namespace App\Http\Controllers;

use app\Models\Doctor;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function create()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
        return view('admin.index');
    }
    public function edit(Doctor $doctor)
    {
        return view('admin.edit');
    }
    public function update(Doctor $doctor)
    {
        return view('admin.edit');
    }
    public function destroy(Doctor $doctor)
    {
        return view('admin.index');
    }

}
