<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    //HasApitoken 使用这个类，client类就具有生成token的方法
    use HasFactory,HasApiTokens;
    public $timestamps = FALSE;
    /**
     * 关联cases table
     */
    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
}
