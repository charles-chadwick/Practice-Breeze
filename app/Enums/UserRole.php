<?php

namespace App\Enums;

enum UserRole: string {
	
	case Admin   = "Admin";
	case Doctor  = "Doctor";
	case Nurse   = "Nurse";
	case Staff   = "Staff";
	case Patient = "Patient";
	
}
