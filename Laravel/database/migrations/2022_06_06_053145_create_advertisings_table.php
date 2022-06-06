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
        Schema::create('advertisings', function (Blueprint $table) {
            $table->id();
            $table->string('integration', 50)->nullable()->comment('unitSlot or autoFit');
			$table->boolean('is_responsive')->nullable()->default('0');
			$table->string('slug', 50);
			$table->string('provider_name', 100)->nullable();
			$table->string('description', 255)->nullable()->comment('Translated in the languages files');
			$table->mediumtext('tracking_code_large')->nullable();
			$table->mediumtext('tracking_code_medium')->nullable();
			$table->mediumtext('tracking_code_small')->nullable();
			$table->boolean('active')->nullable()->default('1');
			$table->unique(["slug"]);
			$table->index(["active"]);
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
        Schema::dropIfExists('advertisings');
    }
};
