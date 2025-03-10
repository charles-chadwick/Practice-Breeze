<?php

namespace App\Models;

class Appointment extends Base
{
	protected $fillable = [
		"patient_id",
		"type",
		"date_and_time",
		"length",
		"status",
		"title",
		"comments"
	];
}
