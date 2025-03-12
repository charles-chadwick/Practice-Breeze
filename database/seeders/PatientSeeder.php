<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		DB::table('patients')
		  ->truncate();
		
		$character_fp = file(database_path("sample/characters.csv"));
		foreach ( $character_fp as $character ) {
			
			$super = User::whereNotIn("role", [ UserRole::Patient, UserRole::Admin ])
						 ->inRandomOrder()
						 ->first();
			
			// get the data
			[ $first_name, $middle_name, $last_name, $gender, $role ] = array_map('trim', str_getcsv($character));
			if ($role != "Patient") {
				continue;
			}
			
			$created_at = fake()->dateTimeBetween($super->created_at, "2021-01-01 01:01:01");
			
			Patient::create([
				"first_name"  => $first_name,
				"middle_name" => $middle_name,
				"last_name"   => $last_name,
				"email"       => str_replace(" ", ".", strtolower("$first_name.$last_name@example.com")),
				"password"    => "password",
				"birth_date"  => fake()->dateTimeBetween($super->created_at, "-1 year"),
				"gender"      => $gender,
				"created_at"  => $created_at
			]);
			
			
		}
	}
	
}
