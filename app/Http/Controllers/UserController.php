<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
	
	public function index () {
		
		$users = User::orderBy(request("order_by", "last_name"))
					 ->get();

		return view("users.index", compact("users"));
	}
}
