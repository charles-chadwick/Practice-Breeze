<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Base {
	
	protected $fillable = [
		"patient_id",
		"appointment_type_id",
		"date_and_time",
		"type",
		"length",
		"status",
		"title",
		"comments"
	];
	
	/**
	 * Patient relationship
	 *
	 * @return BelongsTo
	 */
	public function patient (): BelongsTo {
		
		return $this->belongsTo(Patient::class, "patient_id");
	}
	
	/**
	 * Appointment Type relationship
	 *
	 * @return BelongsTo
	 */
	public function type (): BelongsTo {
		
		return $this->belongsTo(AppointmentType::class, "appointment_type_id");
	}
	
	/**
	 * Get the date of the appointment
	 *
	 * @return string
	 */
	public function getDateAttribute (): string {
		
		return Carbon::parse($this->attributes[ 'date_and_time' ])
					 ->format("m/d/Y");
	}
	
	/**
	 * Get the time of the appointment
	 *
	 * @return string
	 */
	public function getTimeAttribute (): string {
		
		return Carbon::parse($this->attributes[ 'date_and_time' ])
					 ->format("H:i");
	}
	
}
