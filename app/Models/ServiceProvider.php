<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;
    public $timestamps = FALSE;
    /**
     * 关联cases table
     */
    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
}
