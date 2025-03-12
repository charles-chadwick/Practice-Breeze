<?php

namespace App\Enums;

enum UserRole: string {
	
	case Admin  = "Admin";
	case Doctor = "Doctor";
	case Nurse  = "Nurse";
	case Staff  = "Staff";
	
	public static function values (): array {
		
		return [
			self::Doctor->value => self::Doctor->name,
			self::Nurse->value  => self::Nurse->name,
			self::Staff->value  => self::Staff->name,
		];
	}
	
}
