<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSyncsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_syncs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('whs_id')->unsigned();
            $table->string('name', 15)->unique(); //Y32V802/Y32V803/Y32Q810
            $table->longText('description')->nullable()->default('-');
            $table->boolean('to_sync')->nullable()->default(false);
            $table->integer('sync_ontime')->nullable()->default(0);
            $table->integer('retrospective')->nullable()->default(1); //จำนวนวันย้อนหลังที่ต้อง
            $table->boolean('is_actived')->nullable()->default(true);
            $table->timestamps();
            $table->foreign('whs_id')->references('id')->on('whs')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_syncs');
    }
}
