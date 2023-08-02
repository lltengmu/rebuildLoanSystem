<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [ "cases_id","client_id","title","upload_file","file_type","status","update_by" ];

    public function cases()
    {
        return $this->belongsToMany(Cases::class);
    }
}
