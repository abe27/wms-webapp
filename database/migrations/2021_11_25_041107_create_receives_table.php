<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receives', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('service_id')->unsigned();
            $table->uuid('store_id')->unsigned();
            $table->date('receive_date');
            $table->string('receive_no')->unique();
            $table->enum('receive_status', [0, 1, 2, 3, 4])->nullable()->default(0);
            $table->boolean('is_sync')->nullable()->default(false);
            $table->boolean('is_actived')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('file_services')->cascadeOnDelete();
            $table->foreign('store_id')->references('id')->on('stores')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receives');
    }
}
