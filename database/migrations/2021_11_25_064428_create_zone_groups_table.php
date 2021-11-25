<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoneGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zone_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('store_id')->nullable()->unsigned();
            $table->string('zone_name');
            $table->string('zone_id');
            $table->longText('description')->nullable()->default('-');
            $table->boolean('is_actived')->nullable()->default(false);
            $table->timestamps();
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
        Schema::dropIfExists('zone_groups');
    }
}
