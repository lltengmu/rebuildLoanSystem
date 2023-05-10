<?php

namespace App\Http\Controllers\Individual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Client;
use App\Models\Company;
use App\Models\ServiceProvider;
use Illuminate\Support\Carbon;

class Dashboard extends Controller
{
    /**
     * get the view template and init data;
     * @return view pages.individual.dashboard
     */
    public function index()
    {
        $cards = $this->cards();
        $companies = Company::all();
        return view("pages.individual.dashboard", ['cards' => $cards, 'companies' => $companies]);
    }
    /**
     * @return individdual dashboard page init data;
     */
    public function cards()
    {
        $caseCount = Cases::all()->count();
        $clientsCount = Client::all()->count();
        $serviceProvider = ServiceProvider::all()->count();
        $successCases = Cases::where('status', 4)->count();
        $rejectCases = Cases::where('status', 5)->count();
        return [
            'caseCount' => $caseCount,
            'clientsCount' => $clientsCount,
            'serviceProvider' => $serviceProvider,
            'successCases' => $successCases,
            'rejectCases'  => $rejectCases
        ];
    }
    /**
     * @return  individualpage's card filter data;
     */
    public function filterCards(Request $request)
    {
        //获取日期查询条件
        $startDate = $request["daterange"]["start"];
        $endDate = $request["daterange"]["end"];
        /**
         * 处理业务逻辑,第一种情况，只选择时间，没有选择companies
         * Process business logic. In the first scenario, only select time without selecting companies
         */
        if ($request["daterange"] && !$request["companies"]) {
            $cases = Cases::whereBetween("create_datetime", [$startDate, $endDate])->get()->count();
            $clients = Client::whereBetween("create_datetime", [$startDate, $endDate])->get()->count();
            $serviceProvider = ServiceProvider::whereBetween("create_datetime", [$startDate, $endDate])->get()->count();
            $successCases = Cases::whereBetween("create_datetime", [$startDate, $endDate])->where("status", 4)->get()->count();
            $rejectCases = Cases::whereBetween("create_datetime", [$startDate, $endDate])->where("status", 5)->get()->count();
            return [
                "cases"           => $cases,
                "clients"         => $clients,
                "serviceProvider" => $serviceProvider,
                "successCases"    => $successCases,
                "rejectCases"     => $rejectCases
            ];
        }
        /**
         * 第二种情况，有指定时间和机构["companies"]
         * In the second case, there is a designated time and organization
         */
        if ($request["daterange"] && $request["companies"]) {
            $cases = Cases::whereBetween("create_datetime", [$startDate, $endDate])->whereIn("company_id", $request["companies"])->get()->count();
            $clients = Client::whereBetween("create_datetime", [$startDate, $endDate])->get()->count();
            $serviceProvider = ServiceProvider::whereBetween("create_datetime", [$startDate, $endDate])->whereIn("company_id", $request["companies"])->get()->count();
            $successCases = Cases::whereBetween("create_datetime", [$startDate, $endDate])->whereIn("company_id", $request["companies"])->where("status", 4)->get()->count();
            $rejectCases = Cases::whereBetween("create_datetime", [$startDate, $endDate])->whereIn("company_id", $request["companies"])->where("status", 5)->get()->count();
            return [
                "cases"           => $cases,
                "clients"         => $clients,
                "serviceProvider" => $serviceProvider,
                "successCases"    => $successCases,
                "rejectCases"     => $rejectCases
            ];
        }
        return ["error" => "invalid params"];
    }
    /**
     * @return lineChart data
     */
    public function LineChart()
    {
        // 定义一个空数组，用于存储月份的月初日期和月尾日期
        $months = [];
        $serviceProvider = ServiceProvider::select("id", "first_name", "last_name")->get()->toArray();
        //树状图按月份展示数据,循环遍历从当前月份往前的5个月份
        for ($i = 0; $i < 5; $i++) {
            // 获取当前时间
            $now = Carbon::now();
            $monthNow = Carbon::now();
            // 将月份的月初日期和月尾日期添加到 $months 数组中
            // dump($monthNow->subMonths($i)->format("F"));
            $months[] = [
                //每个月份的名称
                'month' => $monthNow->subMonths($i)->format("F"),
                //每个月份的开始日期,如 2023-04-01
                "start" => $now->subMonth($i)->startOfMonth()->toDateString(),
                //每个月份的结束日期,如 2023-04-30
                "end" => $now->subMonth(0)->endOfMonth()->toDateString()
            ];
        }
        //根据月份,获取每个月，每个 service provider的 case 数量,并返回渲染树状图所需数据
        return array_map(function ($item) {
            $cases = Cases::whereBetween("create_datetime", [$item["start"], $item["end"]])->with("ServiceProvider:id,first_name,last_name")->get()->toArray();
            return [
                "data" => ["y" => $item["month"]] + $this->handleEveryServiceProviderCount($cases)["data"],
                "ykeys" => $this->handleEveryServiceProviderCount($cases)["ykeys"],
                "labels" => $this->handleEveryServiceProviderCount($cases)["labels"]
            ];
        }, $months);
    }
    private function handleEveryServiceProviderCount(array $objectList): array
    {
        $data = [];
        $ykeys = [];
        $labels = [];
        $serviceProviderList = ServiceProvider::select(["id", "first_name", "last_name"])->get();

        foreach ($serviceProviderList as $key => $item) :
            $data[config("captcha.charts")[$key]] = count(array_filter($objectList, function ($value) use ($item) {
                return !is_null($value["service_provider"]) && $value["service_provider"]["id"] == $item->id;
            }));
            $ykeys[$key] = config("captcha.charts")[$key];
            $labels[$key] = $item->first_name . $item->last_name;
        endforeach;

        return [
            "ykeys" => $ykeys,
            "labels" => $labels,
            "data"  => $data
        ];
    }
    /**
     * @return pieChart data
     */
    public function pieChart()
    {
        $data = [];
        $labels = [];
        $serviceProvider = ServiceProvider::with("cases:id,service_provider_id")->get();
        foreach ($serviceProvider as $key => $item) {
            array_push($data, count($item->cases));
            array_push($labels, $item->first_name . $item->last_name);
        }
        return [
            "data" => $data,
            "labels" => $labels
        ];
    }
}
