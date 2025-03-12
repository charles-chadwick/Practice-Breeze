<?php

namespace App\Livewire;

use App\Enums\UserRole;
use App\Models\PatientProfile;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;

class UserProfile extends Component {
	
	public ?User $user                  = null;
	public       $role                  = "";
	public       $first_name            = "";
	public       $last_name             = "";
	public       $email                 = "";
	public       $password              = "";
	public       $password_confirmation = "";
	public       $action                = "save";
	
	public function mount (?User $user): void {
		
		$this->user = $user;
		$this->fill($this->user);
		if (!is_null($user->id)) {
			$this->action = "update";
		}
		
	}
	
	public function render (): View {
		
		return view("livewire.user-profile");
	}
	
	public function update (): null {
		
		$this->validate();
		$this->user->update($this->all());
		
		session()->flash("message", "User successfully updated.");
		
		return $this->redirect(route("users.profile", $this->user->id));
	}
	
	public function save (): null {
		
		$this->validate();
		$this->user = User::create($this->all());
		
		session()->flash("message", "User successfully created.");
		
		return $this->redirect(route("users.profile", $this->user->id));
	}
	
	public function rules (): array {
		
		$rules = [
			"role"                  => [ "required", Rule::in(UserRole::cases()) ],
			"first_name"            => "required|min:3",
			"last_name"             => "required|min:3",
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
