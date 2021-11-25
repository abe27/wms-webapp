<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('service_id')->unsigned();
            $table->uuid('type_id')->unsigned();
            $table->string('file_no', 15);
            $table->string('file_name');
            $table->longText('description')->nullable()->default('-');
            $table->integer('file_size')->nullable()->default(0); //size of kilobytes
            $table->datetime('upload_at')->nullable(); // datetime upload form yazaki server
            $table->string('file_flag', 2)->nullable()->default('-');
            $table->string('file_format', 2)->nullable()->default('-');
            $table->string('file_originator', 15)->nullable()->default('-');
            $table->string('file_filepath')->nullable()->default('-');
            $table->boolean('downloaded')->nullable()->default(false);
            $table->boolean('is_actived')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('system_syncs')->cascadeOnDelete();
            $table->foreign('type_id')->references('id')->on('service_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_services');
    }
}
