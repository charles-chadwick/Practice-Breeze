<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index() {
		return Appointment::with('patient')->whereBeforeToday("date_and_time")->get();
	}
}
