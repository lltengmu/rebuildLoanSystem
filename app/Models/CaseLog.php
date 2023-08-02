<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseLog extends Model
{
    use HasFactory;

    protected $fillable = ["cases_id","action","when","update_by"];
}
