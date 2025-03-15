<?php

namespace App\Livewire;

use App\Enums\AppointmentStatus;
use App\Models\Appointment;
use App\Models\AppointmentType;
use App\Models\Patient;
use App\Rules\AppointmentExists;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;

class AppointmentForm extends Component {
	
	public ?Appointment $appointment;
	public              $date                = null;
	public              $time                = null;
	public              $title               = null;
	public              $type                = null;
	public              $status              = null;
	public              $length              = null;
	public              $patient_id          = null;
	public              $appointment_type_id = null;
	public              $comments            = null;
	
	public $statuses = [];
	public $types    = [];
	public $patients = [];
	
	public function mount (Appointment $appointment): void {
		
		$this->appointment = $appointment;
		$this->fill($this->appointment);
		
		$this->date = date("Y-m-d");
		$this->time = date("H:i");
		$this->types = AppointmentType::all();
		$this->statuses = AppointmentStatus::cases();
		
		if (!is_null($appointment->date_and_time)) {
			$this->date = Carbon::parse($appointment->date_and_time)
								->format('Y-m-d');
			$this->time = Carbon::parse($appointment->date_and_time)
								->format('H:i');
		}
		
		$this->patients = Patient::orderBy('first_name')
								 ->get();
	}
	
	public function save (): null {
		
		$this->validate();
		$data = $this->all();
		$data["type"] = AppointmentType::find($this->appointment_type_id)->type;
		$data[ "date_and_time" ] = Carbon::parse($this->date . " " . $this->time)
										 ->format('Y-m-d H:i:s');

		if (!is_null($this->appointment->id)) {
			$this->appointment->update($data);
			session()->flash("message", "Appointment successfully updated.");
		}
		else {
			$this->appointment = Appointment::create($data);
			session()->flash("message", "Appointment successfully created.");
		}
		
		
		return $this->redirect(route("appointments.index"));
	}
	
	// 04/20/2025 @ 11:00
	public function rules (): array {
		
		return [
			"patient_id"          => [ "required", "exists:patients,id" ],
    		"appointment_type_id" => [ "required", "exists:appointment_types,id" ],
			"date"                => [ "required", "date", "date_format:Y-m-d", new AppointmentExists ],
			"time"                => [ "required" ],
			"length"              => [ "required" ],
			"title"               => [ "required", "string" ],
			"type"				  => ["nullable"]
		];
	}
	
	public function render (): View {
		
		return view('livewire.appointment-form');
	}
	
}
