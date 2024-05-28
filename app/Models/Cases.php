<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cases extends Model
{
    use HasFactory, SoftDeletes;

    //数据导入时可被填充的字段
    protected $fillable = [
        "sys_id",
        "loan_amount",
        "payment_amount",
        "disbursement_date",
        "payment_method",
        "co_signer_first_name",
        "co_signer_last_name",
        "case_status",
        "company_id",
        "purpose",
        "repayment_period",
        "date_of_pay",
        "purpose",
        "case_remark",
        "update_by"
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
    //关联case_status_table case表中应该有一个lbo_case_status_id与 lbo_case_status表中的id相关联·
    public function LboCaseStatus()
    {
        //自定义关联字段，告诉模型，case 表中的case_status 与lbo_case_status表中的id字段相关联
        return $this->belongsTo(LboCaseStatus::class, 'case_status');
    }
    public function ServiceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }
    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }
}
