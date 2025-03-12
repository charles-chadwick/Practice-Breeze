<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
	
	public function index () {
		
		$users = User::orderBy("last_name")
					 ->get();

		return view("users.index", compact("users"));
	}
	
	public function profile($user_id) {

		return view("users.profile", ["user" => User::findorFail($user_id)]);
	}
	
}
