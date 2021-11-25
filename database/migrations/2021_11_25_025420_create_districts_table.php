<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('province_id')->unsigned();
            $table->string('district_code')->unique();
            $table->string('district');
            $table->longText('description')->nullable()->default('-');
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->boolean('is_actived')->nullable()->default(true);
            $table->timestamps();
            $table->foreign('province_id')->references('id')->on('provinces')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
