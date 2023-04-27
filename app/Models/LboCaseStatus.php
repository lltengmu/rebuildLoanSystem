<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LboCaseStatus extends Model
{
    use HasFactory;
    public $timestamps = FALSE;

    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
}
