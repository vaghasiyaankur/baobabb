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
        Schema::table('currencies', function (Blueprint $table) {
            $table->string('code')->nullable();
            $table->string('entities')->nullable();
            $table->string('symbol_left')->nullable();
            $table->string('decimal_place')->nullable();
            $table->string('decimal_seprator')->nullable();
            $table->string('thousand_operator')->nullable();
            // $table->dropColumn('country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('entities');
            $table->dropColumn('symbol_left');
            $table->dropColumn('decimal_place');
            $table->dropColumn('decimal_seprator');
            $table->dropColumn('thousand_operator');
        });
    }
};
