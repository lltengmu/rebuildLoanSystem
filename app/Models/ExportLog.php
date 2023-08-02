<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportLog extends Model
{
    use HasFactory;

    protected $casts = ['cases_id' => 'array'];

    protected $fillable = ["user_id", "cases_id", "when", "update_by"];
}
