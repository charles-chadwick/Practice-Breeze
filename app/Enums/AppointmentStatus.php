<?php

namespace App\Enums;

enum AppointmentStatus: string {
	
	case Scheduled   = "Scheduled";
	case Pending     = "Pending";
	case Cancelled   = "Cancelled";
	case Rescheduled = "Rescheduled";
	case Completed   = "Completed";
	
}
