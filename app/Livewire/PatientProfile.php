<?php

namespace App\Livewire;

use App\Enums\PatientRole;
use App\Models\Patient;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;

class PatientProfile extends Component {
	
	public ?Patient $patient               = null;
	public          $first_name            = "";
	public          $middle_name           = "";
	public          $last_name             = "";
	public          $birth_date                   = "";
	public          $gender                = "";
	public          $email                 = "";
	public          $password              = "";
	public          $password_confirmation = "";
	public          $action                = "save";
	
	public function mount (?Patient $patient): void {
		
		$this->patient = $patient;
		$this->fill($this->patient);
		if (!is_null($patient->id)) {
			$this->action = "update";
		}
		
	}
	
	public function render (): View {
		
		return view("livewire.patient-profile");
	}
	
	public function update (): null {
		
		$this->validate();
		$this->patient->update($this->all());
		
		session()->flash("message", "Patient successfully updated.");
		
		return $this->redirect(route("patients.index"));
	}
	
	public function save (): null {
		
		$this->validate();
		$this->patient = Patient::create($this->all());
		
		session()->flash("message", "Patient successfully created.");
		
		return $this->redirect(route("patients.index"));
	}
	
	public function rules (): array {
		
		$rules = [
			"first_name"            => "required|min:3",
			"middle_name"           => "nullable",
			"last_name"             => "required|min:3",
			"birth_date"            => "required|date",
			"gender"                => "required",
			"email"                 => "required|email",
			"password"              => "required|min:8",
			"password_confirmation" => "required|min:8|same:password",
		];
		
		if ($this->action === "update") {
			$rules[ "password" ] = "sometimes|min:8";
			$rules[ "password_confirmation" ] = "sometimes|required_with:password|min:8|same:password";
		}
		
		return $rules;
	}
	
}
