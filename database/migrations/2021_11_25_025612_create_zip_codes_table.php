<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('district_id')->unsigned();
            $table->string('territory');
            $table->string('zip_code');
            $table->longText('description')->nullable()->default('-');
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->boolean('is_actived')->nullable()->default(true);
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
}
