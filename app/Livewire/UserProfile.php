<?php

namespace App\Livewire;

use App\Enums\UserRole;
use App\Models\PatientProfile;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class UserProfile extends Component {
	
	public ?User $user        = null;
	public       $first_name  = "";
	public       $middle_name = "";
	public       $last_name   = "";
	public       $email       = "";
	public       $dob;
	public       $gender;
	public $action = "save";
	
	public function mount (User $user) {
		
		$this->user = $user;
		$this->fill($this->user);
		
		if (!is_null($user->profile)) {
			$this->action = "update";
			$this->dob = $user->profile->dob;
			$this->gender = $user->profile->gender;
		}
		
	}
	
	public function render (): View {
		
		return view("livewire.user-profile");
	}
	
	public function update () {
		
		$this->validate();
		
		$this->user->update($this->except("dob", "gender"));
		$this->user->profile->update($this->only("dob", "gender"));
		
		session()->flash('status', 'User successfully updated.');
		
		return $this->redirect(route('users.profile', $this->user->id));
	}
	
	public function save () {
		
		$this->validate();
		dd($this->dob);
		$this->fill($this->all());
		$data = $this->except("dob", "gender");
		$data["role"] = UserRole::Patient;
		$data["password"] = "password";
		$this->user = User::create($data);
		
		PatientProfile::create([
			"patient_id" => $this->user->id,
			"dob" => $this->dob,
			"gender" => $this->gender,
		]);
		
		session()->flash('status', 'User successfully updated.');
		
		return $this->redirect(route('users.profile', $this->user->id));
	}
	
	public function rules () {
		
		return [
			"first_name"  => "required|min:3",
			"middle_name" => "nullable|min:3",
			"last_name"   => "required|min:3",
			"email"       => "required|email",
			"dob"         => "nullable|date",
			"gender"      => "nullable|string",
		];
	}
	
}
