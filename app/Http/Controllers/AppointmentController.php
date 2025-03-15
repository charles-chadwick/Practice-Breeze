<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller {
	
	public function index () {
		
		$appointments = Appointment::with('patient')
								   ->where(function ($query) {
									   if (request("patient_id") != "") {
										   $query->where("patient_id", request("patient_id"));
									   }
								   })
								   ->orderBy(request("order_by", "date_and_time"))
								   ->paginate(25);
		
		return view("appointments.index", compact("appointments"));
	}
	
}
