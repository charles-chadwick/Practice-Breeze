<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\User;
use Arr;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		foreach ( User::where("role", "Patient")
					  ->get() as $patient ) {
			
			for ( $i = 0; $i <= rand(0, 20); $i++ ) {
				
				$date_time = Carbon::parse(fake()->dateTimeBetween($patient->created_at, "+3 months"))
								   ->setTime(rand(8, 15), 0);
				
				$status = "Scheduled";
				if ($date_time < Carbon::now()) {
					$status = "Completed";
				}
				
				Appointment::create([
					"patient_id"    => $patient->id,
					"status"        => $status,
					"date_and_time" => $date_time,
					"length"        => Arr::random([ 15, 30, 45 ]),
					"type"          => "In Office",
					"title"         => fake()->text(rand(10, 20)),
					"comments"      => fake()->text(rand(10, 200)),
				]);
				
			}
			
		}
	}
	
}
