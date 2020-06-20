<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('شناسه نویسنده');
//            $table->unsignedInteger('operator_id')->comment('شناسه اپراتور')->nullable();
            $table->unsignedInteger('weblog_id')->comment('شناسه وبلاگ')->nullable();
            $table->string('title', 200);
//            $table->string('head_line', 200)->nullable();
            $table->string('image', 200);
            $table->string('summary', 250);
            $table->mediumText('content');

//            $table->boolean('is_special')->default(false);
            $table->boolean('has_comment')->default(false);
//            $table->integer('priority')->default(0);
//            $table->timestamp('publish_at')->comment('تاریخ انتشار');
//            $table->timestamp('expire_at')->nullable()->comment('تاریخ انقضا');
            $table->enum('status', ['publish', 'draft'])->default('publish')->comment('منتشر شده یا پیش نویس');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
//            $table->foreign('operator_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('weblog_id')->references('id')->on('weblogs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
