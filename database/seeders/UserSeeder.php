<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		DB::table('users')->truncate();
		$super = User::create([
			"role"        => "Admin",
			"first_name"  => "John",
			"middle_name" => "Ben",
			"last_name"   => "Doe",
			"email"       => "john.doe@example.com",
			"password"    => "password",
			"created_at"  => "2020-01-01 01:01:01"
		]);
		
		$character_fp = fopen(database_path("sample/characters.csv"), "r");
		while ( !feof($character_fp) ) {
			
			// get the data
			[ $first_name, $middle_name, $last_name, $gender, $role ] = array_map('trim', fgetcsv($character_fp));
			
			// set a good created_at time based on the role
			$created_at = fake()->dateTimeBetween($super->created_at, "-1 years");
			if ($role == "Patient") {
				
				// this can be used later to set the created_by field
				$user = User::where("role", "!=", "Patient")
							->inRandomOrder()
							->first();
				
				$created_at = fake()->dateTimeBetween($user->created_at, "-1 month");
			}
			
			User::create([
				"role"        => $role,
				"first_name"  => $first_name,
				"middle_name" => $middle_name,
				"last_name"   => $last_name,
				"email"       => str_replace(" ", ".", strtolower("$first_name.$last_name@example.com")),
				"password"    => "password",
				"created_at"  => $created_at
			]);
			
			
		}
		fclose($character_fp);
		
		
	}
	
}
