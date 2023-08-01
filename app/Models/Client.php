<?php

namespace App\Models;

use App\Listeners\SendNotificationSubscriber;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;




class Client extends Model
{
    //HasApitoken 使用这个类，client类就具有生成token的方法
    use HasFactory, HasApiTokens, Notifiable, SoftDeletes;

    //定义数据导入时可被填充的字段
    protected $fillable = [
        "email",
        "password",
        "appellation",
        "first_name",
        "last_name",
        "HKID",
        "mobile",
        "nationality",
        "building",
        "unit",
        "floor",
        "area",
        "addressOne",
        "addressTwo",
        "job_status",
        "salary",
        "company_name",
        "company_contact",
        "company_addres",
        "date_of_birth",
        "create_datetime",
        "ip",
        "browser",
        "sys_id",
        "device",
        "platform"
    ];
    /**
     * 关联cases table
     */
    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }
    public function verificationlog()
    {
        return $this->hasOne(EmailVerificationLog::class);
    }
}
