<?php

namespace App\Livewire;

use App\Models\AppointmentType;
use Livewire\Component;
use Illuminate\View\View;

class AppointmentTypeForm extends Component {
	
	public ?AppointmentType $type;
	public                  $title;
	public                  $length;
	public                  $description;
	public                  $action = "save";
	
	public function mount (AppointmentType $type): void {
		
		$this->type = $type;
		$this->fill($type);
	}
	
	public function render (): View {
		
		return view('livewire.appointment-type-form');
	}
	
	public function save(): null {
		
		$this->validate();
		
		if (!is_null($this->type->id)) {
			$this->type->update($this->all());
			session()->flash("message", "Appointment successfully updated.");
		} else {
			AppointmentType::create($this->all());
			session()->flash("message", "Appointment successfully created.");
		}
		
		return $this->redirect(route("types.index"));
	}
	
	public function rules(): array {
		return [
			"title" => "required",
			"length" => "required",
			"description" => "required",
		];
	}
}
