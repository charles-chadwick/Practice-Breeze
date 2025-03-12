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
		
		DB::table('users')
		  ->truncate();
		$super = User::create([
			"role"        => "Admin",
			"first_name"  => "John",
			"last_name"   => "Doe",
			"email"       => "john.doe@example.com",
			"password"    => "password",
			"created_at"  => "2020-01-01 01:01:01"
		]);
		
		$character_fp = file(database_path("sample/characters.csv"));
		foreach($character_fp as $character) {
			
			// get the data
			[ $first_name, $middle_name, $last_name, $gender, $role ] = array_map('trim', str_getcsv($character));

			if ($role == "Patient") {
				continue;
			}
			
			$created_at = fake()->dateTimeBetween($super->created_at, "2021-01-01 01:01:01");
			
			User::create([
				"role"       => $role,
				"first_name" => $first_name,
				"last_name"  => $last_name,
				"email"      => str_replace(" ", ".", strtolower("$first_name.$last_name@example.com")),
				"password"   => "password",
				"created_at" => $created_at
			]);
			
			
		}

	}
	
}
