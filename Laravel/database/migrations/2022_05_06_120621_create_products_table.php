<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('type_of');
            $table->string('cash');
            $table->string('condition');
            $table->string('phone');
            $table->string('lat');
            $table->string('long');
            $table->string('image');
            $table->string('gallery')->nullable();
            $table->string('video')->nullable();
            $table->string('description');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('price');
            $table->string('sale_price')->nullable();
            $table->integer('impression')->default(0);
            $table->integer('click')->default(0);
            $table->softDeletes();
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
};
