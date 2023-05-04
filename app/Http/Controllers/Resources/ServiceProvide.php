<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ServiceProvide extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据
        $data = ServiceProvider::select(["sys_id", "company_id","first_name", "last_name", "email", "status"])->get()->toArray();
        //数据处理
        return array_map(function ($key, $item) {
            return [
                "num" => $key + 1, 
                "id" => $item["sys_id"],
                "company" => app("utils")->company($item["company_id"]),
                "first_name" => $item["first_name"],
                "last_name" =>$item["last_name"],
                "email"  => $item["email"],
                "status" => $item["status"]
             ];
        }, array_keys($data), array_values($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceProvider::destroy($this->decryptID($id));
        $data = ServiceProvider::find($this->decryptID($id));
        return is_null($data) ? ['success' => "删除成功"] : ['error' => "删除失败"];
    }
}
