<?php

namespace App\Enums;

enum AppointmentStatus: string {
	
	case Available   = "Available";
	case Scheduled   = "Scheduled";
	case Pending     = "Pending";
	case Cancelled   = "Cancelled";
	case Rescheduled = "Rescheduled";
	case Completed   = "Completed";
	
}
