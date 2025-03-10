<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Base
{
	public function user(): BelongsTo {
		return $this->belongsTo(User::class, "id", "user_id");
	}
}
