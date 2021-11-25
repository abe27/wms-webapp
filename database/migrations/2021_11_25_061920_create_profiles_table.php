<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id',  25)->unsigned();
            $table->uuid('whs_id')->nullable()->unsigned();
            $table->uuid('store_id')->nullable()->unsigned();
            $table->uuid('zipcode_id')->nullable()->unsigned();
            $table->uuid('depart_id')->nullable()->unsigned();
            $table->uuid('position_id')->nullable()->unsigned();
            $table->uuid('consumer_id')->nullable()->unsigned();
            $table->string('empcode')->nullable();
            $table->string('address_1')->nullable();
            $table->longText('address_2')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('sexual', ['-', 'Male', 'Female'])->nullable()->default('-');
            $table->string('avatar')->nullable()->default('-');
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->boolean('is_status')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('zipcode_id')->references('id')->on('zip_codes')->nullOnDelete();
            $table->foreign('depart_id')->references('id')->on('departs')->nullOnDelete();
            $table->foreign('position_id')->references('id')->on('positions')->nullOnDelete();
            $table->foreign('whs_id')->references('id')->on('whs')->nullOnDelete();
            $table->foreign('store_id')->references('id')->on('stores')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
