<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('short_description');
            $table->string('long_description');
            $table->string('price');
            $table->string('image');
            $table->boolean('status')->default(1);
            $table->enum('exist', ['yes', 'no'])->default('yes')->comment(' موجود یا تمام شده');
            $table->enum('kind', ['special', 'popular','new'])->nullable();
            $table->integer('star')->nullable();
            $table->integer('count')->nullable();
            $table->integer('size_id');
            $table->integer('color_id');
            $table->integer('category_id');
            $table->integer('brand_id');
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
        Schema::dropIfExists('products');
    }
}
