<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Arr;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientProfileSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		DB::table("patient_profiles")
		  ->truncate();
		
		$character_fp = fopen(database_path("sample/characters.csv"), "r");
		while ( !feof($character_fp) ) {
			
			// get the data
			[ $first_name, $middle_name, $last_name, $gender, $role ] = array_map('trim', fgetcsv($character_fp));
			$patient = User::with("profile")
						   ->where("first_name", $first_name)
						   ->where("last_name", $last_name)
				->where("role", "Patient")
						   ->first();
			
			if ($patient === null) { continue; }
			
			$patient->profile()
					->create([
						"dob"    => fake()
							->dateTimeBetween("-80 years", "-2 years")
							->format('Y-m-d'),
						"gender" => $gender,
					]);
		}
	}
	
}
