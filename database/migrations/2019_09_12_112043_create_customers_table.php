<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('openid')->comment('客户标识');
            $table->string('name')->comment('客户姓名')->nullable();
            $table->integer('sex')->comment('性别:0为女士，1为先生')->nullable();
            $table->string('phone')->comment('联系方式')->nullable();
            $table->string('address')->comment('地址')->nullable();
            $table->string('company')->comment('公司')->nullable();
            $table->string('collection')->comment('收藏的产品,感兴趣')->nullable();
            $table->string('apply')->comment('意向产品,想要合作')->nullable();
            $table->string('have')->comment('已合作产品')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
