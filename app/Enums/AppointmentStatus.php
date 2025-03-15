<?php

namespace App\Enums;

enum AppointmentStatus: string {
	
	case Available   = "Available";
	case Scheduled   = "Scheduled";
	case Pending     = "Pending";
	case Cancelled   = "Cancelled";
	case Rescheduled = "Rescheduled";
	case Completed   = "Completed";
	
	public static function asArray (): array {
		
		return [
			self::Available->value   => self::Available->value,
			self::Scheduled->value   => self::Scheduled->value,
			self::Pending->value     => self::Pending->value,
			self::Cancelled->value   => self::Cancelled->value,
			self::Rescheduled->value => self::Rescheduled->value,
			self::Completed->value   => self::Completed->value,
		];
	}
	
}
