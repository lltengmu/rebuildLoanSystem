<?php

namespace App\Service;

use App\Models\Company;
use App\Models\LboAppellations;
use App\Models\LboCaseStatus;
use App\Models\LboDistrict;
use App\Models\LboEmployment;
use App\Models\LboLoanPurpose;
use Exception;

class UtilsService
{
    protected $appellationArr;
    protected $caseStatusArr;
    protected $companyArr;
    protected $jobStatusArr;
    /**
     * init labels data
     */
    public function init()
    {
        $this->appellationArr = LboAppellations::all()->toArray();
        $this->caseStatusArr = LboCaseStatus::all()->toArray();
        $this->companyArr = Company::all()->toArray();
        $this->jobStatusArr = Company::all()->toArray();
    }
    /**
     * @return appellation id or label_tc
     */
    public function appellation($value)
    {
        if (!is_int($value)) {
            //如果传递的不是数字，则默认是需要获取id
            foreach ($this->appellationArr as $key => $item) {
                if ($item["label_tc"] || $item["label_en"] == $value) return $item["id"];
            }
        } else {
            //如果传递的是id，则需要获取的是label
            foreach ($this->appellationArr as $key => $item) {
                if ($item["id"] == $value) return $item["label_tc"];
            }
        }
    }
    /**
     * @return case_status id
     */
    public function caseStatus($value)
    {
        if (!is_int($value)) {
            return LboCaseStatus::where("label_tc", $value)->orWhere("label_en", $value)->first()->id;
        }
        return LboCaseStatus::where("id", $value)->first()->label_tc;
    }
    /**
     * @return company id
     */
    public function company($value)
    {
        if (!is_int($value)) {
            return Company::where("label_tc", $value)->orWhere("label_en", $value)->first()->id;
        }
        return Company::where("id", $value)->first()->name;
    }
    /**
     * @return job_status id or label_tc
     */
    public function jobStatus($value)
    {

        if (!is_int($value)) {
            return LboEmployment::where("label_tc", $value)->orWhere("label_en", $value)->first()->id;
        }
        return LboEmployment::where("id", $value)->first()->label_tc;
    }
    /**
     * @return purpose id or label_tc
     */
    public function purpose($value)
    {
        if (!is_int($value)) {
            return LboLoanPurpose::where("label_tc", $value)->orWhere("label_en", $value)->first()->id;
        }
        return LboLoanPurpose::where("id", $value)->first()->label_tc;
    }
    /**
     * @return area id or label_tc
     */
    public function area($value)
    {
        if (!is_int($value)) {
            return LboDistrict::where("label_tc", $value)->orWhere("label_en", $value)->first()->id;
        }
        return LboDistrict::where("id", $value)->first()->label_tc;
    }
    /**
     * get breweo name
     */
    public function browser(string $userAgent)
    {
        if (preg_match('/MSIE/i', $userAgent)) {
            $browser = "Internet Explorer";
        } elseif (preg_match('/Firefox/i', $userAgent)) {
            $browser = "Firefox";
        } elseif (preg_match('/Chrome/i', $userAgent)) {
            $browser = "Chrome";
        } elseif (preg_match('/Safari/i', $userAgent)) {
            $browser = "Safari";
        } elseif (preg_match('/Opera/i', $userAgent)) {
            $browser = "Opera";
        } else {
            $browser = "Unknown";
        }
        return $browser;
    }
}
