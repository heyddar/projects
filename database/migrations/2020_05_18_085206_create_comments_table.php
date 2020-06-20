<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->comment('عنوان کامنت');
            $table->string('name', 100)->comment('نام نویسنده کامنت');
            $table->string('email', 100)->comment('آدرس ایمیل');
            $table->text('content')->comment('متن کامنت');
            $table->boolean('is_accepted')->comment('وضعیت پذیرفته شدن کامنت');
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
        Schema::dropIfExists('comments');
    }
}
