<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller {
	
	public function index () {
		
		$patients = Patient::orderBy("last_name")
					 ->get();
		
		return view("patients.index", compact("patients"));
	}

}