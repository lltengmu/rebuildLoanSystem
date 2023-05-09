<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cases extends Model
{
    use HasFactory;

    //软删除
    use SoftDeletes;

    //忽略create_at 和update_at 字段
    public $timestamps = FALSE;

    //数据导入时可被填充的字段
    protected $fillable = [
        "sys_id",
        "loan_amount",
        "payment_amount",
        "disbursement_date",
        "payment_method",
        "co_signer_first_name",
        "co_signer_last_name",
        "create_datetime",
        "case_status",
        "company_id",
        "purpose",
        "repayment_period",
        "purpose"
    ];
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
