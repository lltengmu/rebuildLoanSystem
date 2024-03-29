<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function cases()
    {
        $this->hasMany(Cases::class);
    }
    /**
     * 管理serviceProvider表
     */
    public function ServiceProviders()
    {
        return $this->hasMany(ServiceProvider::class);
    }
}
