<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientProfile extends Base
{
	public function user(): BelongsTo {
		return $this->belongsTo(User::class, "id", "patient_id");
	}
}
