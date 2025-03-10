<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

class User extends Base implements
	AuthenticatableContract,
	AuthorizableContract,
	CanResetPasswordContract {
	
	use Notifiable;
	use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var list<string>
	 */
	protected $fillable = [
		'first_name',
		'middle_name',
		'last_name',
		'email',
		'password',
	];
	
	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var list<string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];
	
	/**
	 * Get the attributes that should be cast.
	 *
	 * @return array<string, string>
	 */
	protected function casts (): array {
		
		return [
			'email_verified_at' => 'datetime',
			'password'          => 'hashed',
		];
	}
	
	public function profile (): HasOne|User {
		if ($this->role == UserRole::Patient->value) {
			return $this->hasOne(PatientProfile::class, "patient_id", "id");
		} else {
			return $this->hasOne(UserProfile::class, "user_id", "id");
		}
		
	}
	
}
