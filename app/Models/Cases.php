<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    public $timestamps = FALSE;
    /**
     * 关联client table
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    //关联company table
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    //关联case_status_table case表中应该有一个lbo_case_status_id与 lbo_case_status表中的id相关联
    public function LboCaseStatus()
    {
        //自定义关联字段，告诉模型，case 表中的case_status 与lbo_case_status表中的id字段相关联
        return $this->belongsTo(LboCaseStatus::class,'case_status');
    }
    public function ServiceProvider(){
        return $this->belongsTo(ServiceProvider::class);
    }
}
