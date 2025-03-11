<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		\DB::table("media")->delete();
		// let's start with just avatars
		foreach ( glob(database_path("sample/avatars/*.jpg")) as $file ) {
			
			$path_info = explode("_", pathinfo($file, PATHINFO_FILENAME));
			$first_name = $path_info[ 0 ];
			$last_name = last($path_info);
			
			$patient = User::where("first_name", $first_name)->where("last_name", $last_name )
						   ->first();
			
			if (is_null($patient)) {
				echo "$file is null!\n";
				continue;
			}

			$patient->addMedia($file)
				->preservingOriginal()
				->usingName(ucwords(implode(" ", $path_info)). " Avatar")
				->toMediaCollection("avatars");
		}
	}
	
}
