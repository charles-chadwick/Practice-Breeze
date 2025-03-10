<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Arr;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		DB::table("user_profiles")
		  ->truncate();
		
		foreach ( User::with("profile")
					  ->whereIn("role", [UserRole::Doctor->value, UserRole::Nurse->value])
					  ->get() as $user ) {
	
			$user->profile()
				 ->create([
					 "npi" => implode("", Arr::random(range(0, 9), 10)),
					 "dea" => implode("", Arr::random(range("A", "Z"), 2)).implode("", Arr::random(range(0, 9), 7)),
				 ]);
		}
		
	}
	
}
