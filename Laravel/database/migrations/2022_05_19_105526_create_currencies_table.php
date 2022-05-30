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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('country_id');
            // $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->nullable();
            $table->string('name');
            $table->string('symbol');
            $table->string('code')->nullable();
            $table->string('entities')->nullable();
            $table->string('symbol_left')->nullable();
            $table->string('decimal_place')->nullable();
            $table->string('decimal_seprator')->nullable();
            $table->string('thousand_operator')->nullable();
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
        Schema::dropIfExists('currencies');
    }
};
