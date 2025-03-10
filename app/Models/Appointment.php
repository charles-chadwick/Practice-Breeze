<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Base {
	
	protected $fillable = [
		"patient_id",
		"type",
		"date_and_time",
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
		
		return $this->belongsTo(User::class, "patient_id");
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
