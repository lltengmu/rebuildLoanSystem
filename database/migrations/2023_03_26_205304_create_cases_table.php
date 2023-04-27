<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sys_id')->nullable()->comment('日期和时间组成的随机字符串');
            $table->integer('client_id')->nullable()->comment('用户id');
            $table->integer('case_status')->comment('实例状态');
            $table->integer('company_id')->nullable()->comment('服务提供商company_id');
            $table->integer('service_provider_id')->nullable()->comment('关联的service_provider id');
            $table->integer('loan_amount')->nullable()->comment('贷款金额');
            $table->integer('payment_amount')->nullable()->comment('付款金额');
            $table->double('loan_interest')->nullable()->comment('尚未明确');
            $table->integer('payment_method')->nullable()->comment('付款方式');
            $table->integer('purpose')->nullable()->comment('贷款用途');
            $table->integer('no_of_payment')->nullable()->comment('尚未明确');
            $table->text('case_remark')->nullable()->comment('备注');
            $table->date('disbursement_date')->nullable()->comment('借款日期');
            $table->date('repayment_period')->nullable()->comment('还款日期');
            $table->boolean('status')->default(1)->comment('状态,1:提交,2:转交到服务提供者,3:服务提供者同意,4:申请成功,5:申请失败');
            $table->string('co_signer_first_name')->nullable();
            $table->string('co_signer_last_name')->nullable();
            $table->string('co_signer_contact')->nullable();
            $table->string('co_signer_HKID')->nullable();
            $table->dateTime('create_datetime')->nullable()->comment('创建时间');
            $table->dateTime('update_datetime')->nullable()->comment('更新时间');
            $table->string('handle_by')->nullable();
            $table->string('update_by')->nullable()->comment('记录是哪个管理员新增的');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases');
    }
}
