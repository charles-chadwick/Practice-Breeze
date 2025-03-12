<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
	
	public function index () {
		
		$patients = User::with('profile')
					 ->where("role", UserRole::Patient)
					 ->orderBy("last_name")
					 ->get();

		return view("users.index", compact("patients"));
	}
	
	public function profile($user_id) {

		return view("users.profile", ["user" => User::findorFail($user_id)]);
	}
	
}
