<?php

namespace App\Rules;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class AppointmentExists implements ValidationRule, DataAwareRule {
	
	protected array $data = [];
	
	/**
	 * Run the validation rule.
	 *
	 * @param Closure(string, ?string=): PotentiallyTranslatedString $fail
	 */
	public function validate (string $attribute, mixed $value, Closure $fail): void {
		
		$appt_id = null;
		$date_and_time = "{$this->data["date"]} {$this->data["time"]}";
		
		if (isset($this->data["appointment"]['id']) && !is_null($this->data["appointment"]['id'])) {
			$appt_id = $this->data[ "appointment" ]['id'];
		}
		
		if (
			Appointment::where("date_and_time", $date_and_time)
					   ->whereNotIn("status", [ AppointmentStatus::Cancelled->value, AppointmentStatus::Rescheduled->value ])
					   ->whereNot('id', $appt_id)
					   ->count() > 0
		) {
			$fail("The date and time {$date_and_time} already exists.");
		}
	}
	
	public function setData ($data): static {
		
		$this->data = $data;
		
		return $this;
	}
	
}
