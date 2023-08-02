<?php

namespace App\Service;

use App\Models\Company;
use App\Models\LboAppellations;
use App\Models\LboCaseStatus;
use App\Models\LboDistrict;
use App\Models\LboEmployment;
use App\Models\LboLoanPurpose;
use App\Models\Client;
use App\Models\Individuals;
use App\Models\ServiceProvider;
use Exception;

class UtilsService
{
    protected $appellationArr;
    protected $caseStatusArr;
    protected $companyArr;
    protected $jobStatusArr;
    protected $LboEmployment;
    protected $LboLoanPurpose;
    protected $LboDistrict;
    protected $LboCaseStatus;
    /**
     * init labels data
     */
    public function __construct()
    {
        $this->appellationArr = LboAppellations::all()->toArray();
        $this->caseStatusArr = LboCaseStatus::all()->toArray();
        $this->companyArr = Company::all()->toArray();
        $this->LboEmployment = LboEmployment::all()->toArray();
        $this->LboLoanPurpose = LboLoanPurpose::all()->toArray();
        $this->LboDistrict = LboDistrict::all()->toArray();
        $this->LboCaseStatus = LboCaseStatus::all()->toArray();
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
            //如果传递的不是数字，则默认是需要获取id
            foreach ($this->LboCaseStatus as $key => $item) {
                if ($item["label_tc"] || $item["label_en"] == $value) return $item["id"];
            }
        } else {
            //如果传递的是id，则需要获取的是label
            foreach ($this->LboCaseStatus as $key => $item) {
                if ($item["id"] == $value) return $item["label_tc"];
            }
        }
    }
    /**
     * @return company id
     */
    public function company($value)
    {
        if (!is_int($value)) {
            //如果传递的不是数字，则默认是需要获取id
            foreach ($this->companyArr as $key => $item) {
                if ($item["name"] == $value) return $item["id"];
            }
        } else {
            //如果传递的是id，则需要获取的是name
            foreach ($this->companyArr as $key => $item) {
                if ($item["id"] == $value) return $item["name"];
            }
        }
    }
    /**
     * @return job_status id or label_tc
     */
    public function jobStatus($value)
    {
        if (!is_int($value)) {
            //如果传递的不是数字，则默认是需要获取id
            foreach ($this->LboEmployment as $key => $item) {
                if ($item["label_tc"] || $item["label_en"] == $value) return $item["id"];
            }
        } else {
            //如果传递的是id，则需要获取的是label
            foreach ($this->LboEmployment as $key => $item) {
                if ($item["id"] == $value) return $item["label_tc"];
            }
        }
    }
    /**
     * @return purpose id or label_tc
     */
    public function purpose($value)
    {
        if (!is_int($value)) {
            //如果传递的不是数字，则默认是需要获取id
            foreach ($this->LboLoanPurpose as $key => $item) {
                if ($item["label_tc"] || $item["label_en"] == $value) return $item["id"];
            }
        } else {
            //如果传递的是id，则需要获取的是label
            foreach ($this->LboLoanPurpose as $key => $item) {
                if ($item["id"] == $value) return $item["label_tc"];
            }
        }
    }
    /**
     * @return area id or label_tc
     */
    public function area($value)
    {
        if (!is_int($value)) {
            //如果传递的不是数字，则默认是需要获取id
            foreach ($this->LboDistrict as $key => $item) {
                if ($item["label_tc"] || $item["label_en"] == $value) return $item["id"];
            }
        } else {
            //如果传递的是id，则需要获取的是label
            foreach ($this->LboDistrict as $key => $item) {
                if ($item["id"] == $value) return $item["label_tc"];
            }
        }
    }
    /**
     * get current user by email and identify
     * @return Individuals | Client | ServicProvider $user
     */
    public function getUserModel(string $identify, string $email)
    {
        switch ($identify):
            case "individual":
                return Individuals::where("email", $email)->first();
            case "clients":
                return Client::where("email", $email)->first();
            case "sp":
                return ServiceProvider::where("email", $email)->first();
        endswitch;
    }
}
