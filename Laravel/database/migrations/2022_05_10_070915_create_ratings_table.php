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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('ratings')->onDelete('cascade');
            $table->unsignedBigInteger('user_to');
            $table->foreign('user_to')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_from');
            $table->foreign('user_from')->references('id')->on('users')->onDelete('cascade');
            $table->integer('rate');
            $table->text('review');
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
        Schema::dropIfExists('ratings');
    }
};
