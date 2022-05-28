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
        Schema::table('countries', function (Blueprint $table) {
            $table->string('capital')->nullable();
            $table->string('continent')->nullable();
            $table->string('tld')->nullable();
            $table->string('calling_code')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('image')->nullable();
            $table->string('language')->nullable();
            $table->string('preferred_time')->nullable();
            $table->string('date_format')->nullable();
            $table->string('time_format')->nullable();
            $table->string('admin_type')->nullable();
            $table->boolean('admin_field_active')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('capital');
            $table->dropColumn('continent');
            $table->dropColumn('tld');
            $table->dropColumn('calling_code');
            $table->dropColumn('currency_code');
            $table->dropColumn('image');
            $table->dropColumn('language');
            $table->dropColumn('preferred_time');
            $table->dropColumn('date_format');
            $table->dropColumn('time_format');
            $table->dropColumn('admin_type');
            $table->dropColumn('admin_field_active');
        });
    }
};
