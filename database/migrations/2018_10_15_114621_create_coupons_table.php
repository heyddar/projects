<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('percent_off', false, true)->default(0)->comment('درصد تخفیف');
            $table->integer('price', false, true)->nullable()->default(0)->comment('حداقل مبلغ سفارش')->change();
            $table->smallInteger('cart_number', false, true)->nullable()->comment('حداکثر خرید');
            $table->dateTime('coupon_start_at')->nullable()->comment('تاریخ شروع اعتبار کد');
            $table->dateTime('coupon_end_at')->nullable()->comment('تاریخ پایان اعتبار کد');
            $table->string('code', 20)->comment('کد تخفیف');
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
        Schema::dropIfExists('coupons');
    }
}
