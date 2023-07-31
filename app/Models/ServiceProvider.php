<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ServiceProvider extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    //定义数据导入时可被填充的字段
    protected $fillable = [
        "email",
        "first_name",
        "last_name",
        "password",
        "mobile",
        "contact",
        "role",
        "ip",
        "company_id",
        "browser",
        "token",
        'device',
        'platform',
        "permission1",
        "permission2",
        "permission3",
        "permission4",
        "update_by",
        "last_login_datetime",
        "sys_id",
        "password"
    ];

    /**
     * 关联cases table
     */
    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
}
