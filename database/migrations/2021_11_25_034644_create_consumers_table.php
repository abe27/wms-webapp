<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('trader_id')->nullable()->unsigned();
            $table->uuid('zipcode_id')->nullable()->unsigned();
            $table->string('consumer_company')->nullable()->default();
            $table->string('consumer_code', 25)->unique();
            $table->string('consumer_name')->nullable()->default();
            $table->string('address_1')->nullable();
            $table->longText('address_2')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('sexual', ['-', 'Male', 'Female'])->nullable()->default('-');
            $table->string('avatar')->nullable()->default('-');
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_actived')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('trader_id')->references('id')->on('traders')->nullOnDelete();
            $table->foreign('zipcode_id')->references('id')->on('zip_codes')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumers');
    }
}
