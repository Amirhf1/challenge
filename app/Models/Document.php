<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Document extends Model
{
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
