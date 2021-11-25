<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('container_id')->unsigned();
            $table->uuid('pallet_id')->unsigned();
            $table->integer('pallet_running');
            $table->boolean('is_sync')->nullable()->default(false);
            $table->enum('is_status', [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10])->nullable()->default(0);
            $table->timestamps();
            $table->foreign('container_id')->references('id')->on('containers')->cascadeOnDelete();
            $table->foreign('pallet_id')->references('id')->on('invoice_pallets')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('container_details');
    }
}
