<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;


class HomeController extends Controller
{
    //
    public function dashboard()
    {
        return view('home', [
            'doctors' => Doctor::take(6)->get()
        ]);
    }
}
