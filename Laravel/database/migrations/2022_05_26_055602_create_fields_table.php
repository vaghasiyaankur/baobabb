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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->enum('belongs_to', ['posts', 'users']);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->boolean('disabled_in_subcategories')->unsigned()->nullable()->default('0');
			$table->text('name')->nullable();
			$table->string('type', 50)->default('text');
			$table->integer('fieldlength')->unsigned()->nullable()->default('255');
			$table->text('default')->nullable();
			$table->boolean('required')->unsigned()->nullable()->default('0');
			$table->boolean('filter')->nullable()->default('0');
			$table->text('help')->nullable();
			$table->boolean('active')->unsigned()->nullable()->default('0');
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
        Schema::dropIfExists('fields');
    }
};
