<?php

namespace Database\Seeders;

use App\Models\AppointmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentTypeSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		DB::table("appointment_types")
		  ->delete();
		
		AppointmentType::insert([
			[
				"title"       => "In Office",
				"description" => "This is an in office appointment",
				"length"      => 30
			],
			[
				"title"       => "House Call",
				"description" => "This is a house call",
				"length"      => 15
			],
			[
				"title"       => "Virtual Visit",
				"description" => "This is a virtual visit.",
				"length"      => 45
			]
		]);
	}
	
}
