<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanTemplate extends Model
{
    use HasFactory;

    protected $fillable = [ "title","template_image","template_text","status","update_by" ];
}
